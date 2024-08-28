<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyEntry;
use App\Models\UserWeight;
use Illuminate\Support\Facades\Auth;

class DailyEntryController extends Controller
{
    public function create()
    {
        return view('daily_entry.create');
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
        $result = $this->interpretResult($request);

        return view('daily_entry.result', compact('result'));
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
}
