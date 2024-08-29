<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KaloriMakanan;
use App\Models\DailyEntry;
use App\Models\UserWeight;
use Illuminate\Support\Facades\Auth;

class DailyEntryController extends Controller
{
    public function create()
    {
        return view('mobile.frontend.assesment.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|integer',
            'question_1' => 'required|boolean',
            'question_2' => 'required_if:question_1,1|boolean',
            'question_3' => 'required_if:question_1,1|in:Tidak pernah atau jarang,Kadang-kadang,Sering,Selalu',
            'question_4' => 'required_if:question_1,1|in:Tidak pernah atau jarang,Kadang-kadang,Sering,Selalu',
            'question_5' => 'required_if:question_1,1|in:Tidak pernah atau jarang,Kadang-kadang,Sering,Selalu',
            'question_6' => 'required_if:question_1,1|in:Tidak pernah atau jarang,Kadang-kadang,Sering,Selalu',
            'question_7' => 'required_if:question_1,1|in:Tidak pernah atau jarang,Kadang-kadang,Sering,Selalu',
        ]);

        $user = Auth::user();

        // Simpan berat badan harian
        UserWeight::create([
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'weight' => $request->input('weight'),
        ]);

        // Simpan kuisioner harian
        DailyEntry::create([
            'user_id' => $user->id,
            'date' => now()->format('Y-m-d'),
            'question_1' => $request->input('question_1'),
            'question_2' => $request->input('question_2'),
            'question_3' => $request->input('question_3'),
            'question_4' => $request->input('question_4'),
            'question_5' => $request->input('question_5'),
            'question_6' => $request->input('question_6'),
            'question_7' => $request->input('question_7'),
        ]);

        // Interpretasi hasil
        $interpretResult = $this->interpretResult($request);

        // Lakukan perhitungan BMI, BMR, TDEE dan rekomendasi kalori
        $calculationResult = $this->calculate($request);

        // Gabungkan hasil interpretasi dan hasil perhitungan
        $result = array_merge(['interpret_result' => $interpretResult], $calculationResult);

        return view('daily_entry.result', $result);
    }

    private function interpretResult(Request $request)
    {
        if ($request->input('question_1') == 0) {
            return 'Tidak berisiko BED';
        }

        $answers = [
            $request->input('question_3'),
            $request->input('question_4'),
            $request->input('question_5'),
            $request->input('question_6'),
            $request->input('question_7'),
        ];

        if (in_array('Sering', $answers) || in_array('Selalu', $answers)) {
            return 'Mengalami BED';
        }

        return 'Beresiko BED';
    }

    public function calculate(Request $request)
    {
        $user = auth()->user();

        $heightInMeters = $user->tinggi_badan / 100;
        $weightInKg = $request->input('weight');
        $age = \Carbon\Carbon::parse($user->tanggal_lahir)->age;

        // BMI Calculation
        $bmi = $weightInKg / ($heightInMeters * $heightInMeters);

        // BMR Calculation using Harris-Benedict equation
        if ($user->jenis_kelamin === 'L') {
            $bmr = 88.362 + (13.397 * $weightInKg) + (4.799 * $user->tinggi_badan) - (5.677 * $age);
        } else {
            $bmr = 447.593 + (9.247 * $weightInKg) + (3.098 * $user->tinggi_badan) - (4.330 * $age);
        }

        // TDEE Calculation
        $activityFactor = $request->input('activity_level', 1.2); // default to sedentary
        $tdee = $bmr * $activityFactor;

        // Get Recommended Calorie Intake from KaloriMakanan table
        $recommendedCalories = KaloriMakanan::where('kalori_per_gram', '<=', $tdee)->get();

        // Return results as an array
        return [
            'bmi' => $bmi,
            'bmr' => $bmr,
            'tdee' => $tdee,
            'recommendedCalories' => $recommendedCalories
        ];
    }
}
