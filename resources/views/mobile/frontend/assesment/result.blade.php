@extends('mobile.frontend.layout.master')

@section('content')
    <div class="page-content" style="margin-top:50px;">

        <div class="page-title page-title-small">
            <h2><a href="/" data-back-button><i class="fa fa-arrow-left"></i></a> Hasil Assessment</h2>
        </div>

        <div class="card header-card shape-rounded" data-card-height="150">
            <div class="card-overlay bg-highlight opacity-95"></div>
            <div class="card-overlay dark-mode-tint"></div>
        </div>

        <div class="card card-style">
            <div class="content">
                <h1>Hasil Evaluasi</h1>

                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>Hasil:</strong></td>
                        <td style="padding: 10px; border: none;">{{ $result }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>BMI:</strong></td>
                        <td style="padding: 10px; border: none;">{{ number_format($bmi, 2) }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>Kategori BMI:</strong></td>
                        <td style="padding: 10px; border: none;">
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
                            {{ $bmiCategory }}
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>BB Sekarang:</strong></td>
                        <td style="padding: 10px; border: none;">{{ number_format($bb, 2) }} kg</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>BB Ideal:</strong></td>
                        <td style="padding: 10px; border: none;">{{ number_format($bbIdeal, 2) }} kg</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>Kebutuhan Kalori Harian tanpa aktivitas:</strong>
                        </td>
                        <td style="padding: 10px; border: none;">{{ number_format($bmrBase, 2) }} kcal/hari</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>Kebutuhan Kalori Harian dengan aktivitas:</strong>
                        </td>
                        <td style="padding: 10px; border: none;">{{ number_format($bmrCorrected, 2) }} kcal/hari</td>
                    </tr>
                    <tr>
                        <td style="padding: 10px; border: none;"><strong>Total Kebutuhan Kalori:</strong></td>
                        <td style="padding: 10px; border: none;">{{ number_format($totalCaloriesRounded, 2) }} kcal/hari
                        </td>
                    </tr>
                </table>

                {{-- <h2>Saran Konsumsi Kalori</h2> --}}
                {{-- <ul>
                    @foreach ($recommendedCalories as $food)
                        <li>{{ $food->nama_makanan }} - {{ $food->kalori_per_gram }} kalori per gram</li>
                    @endforeach
                </ul> --}}
            </div>
        </div>

        <div class="content mt-0">
            <div class="row">
                <div class="col-6">

                    <h2>Saran</h2>
                    <ul>
                        @if ($result == 'Mengalami BED')
                            <li>Kurangi konsumsi makanan yang tinggi kalori dan gula.</li>
                            <li>Fokus pada makanan dengan kandungan serat tinggi dan protein rendah kalori.</li>
                            <li>Konsultasikan dengan ahli gizi untuk mendapatkan rencana makan yang lebih tepat.</li>

                            <div class="content mt-0">
                                <div class="row">
                                    <div class="col-6">
                                        <a href="#" class="btn btn-full btn-m rounded-s text-uppercase font-900 shadow-xl bg-highlight">
                                            @if (session('lang') === 'id')
                                                {{ 'Mulai Pemulihan' }}
                                            @else
                                                {{ $translate->translate('Mulai Pemulihan') }}
                                            @endif
                                        </a>
                                    </div>
                                    <div class="col-6">
                                        <a href="#"
                                            class="btn btn-full btn-border btn-m rounded-s text-uppercase font-900 shadow-l border-highlight color-highlight">
                                            @if (session('lang') === 'id')
                                                {{ 'Hubungi Ahli' }}
                                            @else
                                                {{ $translate->translate('Hubungi Ahli') }}
                                            @endif
                                        </a>
                                    </div>
                                </div>
                            </div>



                        @elseif ($result == 'Beresiko BED')
                            <li>Perhatikan pola makan dan cobalah untuk tidak makan berlebihan.</li>
                            <li>Ikuti saran diet seimbang dengan porsi makan yang teratur.</li>
                            <li>Jika diperlukan, pertimbangkan untuk berbicara dengan seorang konselor.</li>
                        @else
                            <li>Teruskan pola makan sehat dan gaya hidup aktif.</li>
                            <li>Pastikan asupan kalori sesuai dengan kebutuhan tubuh Anda.</li>
                            <li>Selalu jaga keseimbangan nutrisi dalam makanan sehari-hari.</li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
@endsection
