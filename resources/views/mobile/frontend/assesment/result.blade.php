@extends('layouts.app')

@section('content')
@endsection

@extends('mobile.frontend.layout.master')

@section('content')
    <div class="page-content" style="margin-top:50px;">
        <div class="page-title page-title-small">
            <h2><a href="/" data-back-button><i class="fa fa-arrow-left"></i></a> Hasil Assetment</h2>
        </div>

        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
        </div>

        <div class="card card-style">
            <div class="content">
                <h1>Hasil Evaluasi</h1>
                <p>{{ $result }}</p>

                <h1>Hasil Kalkulasi Kesehatan</h1>
                <p><strong>BMI:</strong> {{ number_format($bmi, 2) }}</p>

                {{-- Menambahkan indikator BMI --}}
                @php
                    $bmiCategory = '';
                    if ($bmi < 18.5) {
                        $bmiCategory = 'Underweight';
                    } elseif ($bmi >= 18.5 && $bmi < 24.9) {
                        $bmiCategory = 'Normal';
                    } elseif ($bmi >= 25 && $bmi < 29.9) {
                        $bmiCategory = 'Overweight';
                    } else {
                        $bmiCategory = 'Obese';
                    }
                @endphp
                <p><strong>Kategori BMI:</strong> {{ $bmiCategory }}</p>

                <p><strong>BB Sekarang:</strong> {{ number_format($bb, 2) }} kg</p>
                <p><strong>BB Ideal:</strong> {{ number_format($bbIdeal, 2) }} kg</p>
                <p><strong>Kebutuhan Kalori Harian tanpa aktivitas:</strong> {{ number_format($bmrBase, 2) }} kcal/hari</p>
                <p><strong>Kebutuhan Kalori Harian dengan aktivitas:</strong> {{ number_format($bmrCorrected, 2) }} kcal/hari</p>
                <p><strong>Total Kebutuhan Kalori:</strong> {{ number_format($totalCaloriesRounded, 2) }} kcal/hari</p>

                <h2>Saran Konsumsi Kalori</h2>
                {{-- <ul>
                    @foreach ($recommendedCalories as $food)
                        <li>{{ $food->nama_makanan }} - {{ $food->kalori_per_gram }} kalori per gram</li>
                    @endforeach
                </ul> --}}
            </div>
        </div>
    </div>
@endsection
