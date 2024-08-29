@extends('layouts.app')

@section('content')
<h1>Hasil Evaluasi</h1>
<p>{{ $result }}</p>

<h1>Hasil Kalkulasi Kesehatan</h1>

<p><strong>BMI:</strong> {{ number_format($bmi, 2) }}</p>
<p><strong>BB Ideal:</strong> {{ number_format($bbIdeal, 2) }} kg</p>
<p><strong>Energi Basal (BMR):</strong> {{ number_format($bmrBase, 2) }} kcal/hari</p>
<p><strong>BMR Dikoreksi (dengan aktivitas):</strong> {{ number_format($bmrCorrected, 2) }} kcal/hari</p>
<p><strong>Total Kebutuhan Kalori:</strong> {{ number_format($totalCaloriesRounded, 2) }} kcal/hari</p>

<h2>Saran Konsumsi Kalori</h2>
<ul>
    @foreach($recommendedCalories as $food)
    <li>{{ $food->nama_makanan }} - {{ $food->kalori_per_gram }} kalori per gram</li>
    @endforeach
</ul>

<a href="{{ route('daily_entries.create') }}">Kembali</a>

@endsection
