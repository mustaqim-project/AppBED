@extends('layouts.app')

@section('content')
<form action="{{ route('daily_entries.store') }}" method="POST">
    @csrf
    <div>
        <label>Berat Badan Hari Ini (kg):</label>
        <input type="number" name="weight" required>
    </div>

    <div>
        <label>1. Dalam tiga bulan terakhir, apakah Anda pernah mengalami makan dalam jumlah banyak lebih dari porsi biasanya?</label>
        <input type="radio" name="question_1" value="1" required> Iya
        <input type="radio" name="question_1" value="0" required> Tidak
    </div>

    <div id="additional-questions" style="display: none;">
        <div>
            <label>2. Apakah Anda sedang merasa tertekan atau stress ketika mengonsumsi makan berlebih?</label>
            <input type="radio" name="question_2" value="1"> Ya
            <input type="radio" name="question_2" value="0"> Tidak
        </div>

        <div>
            <label>3. Seberapa sering Anda merasa tidak memiliki kemampuan mengendalikan pola makan dalam tiga bulan terakhir?</label>
            <select name="question_3">
                <option value="Tidak pernah atau jarang">Tidak pernah atau jarang</option>
                <option value="Kadang-kadang">Kadang-kadang</option>
                <option value="Sering">Sering</option>
                <option value="Selalu">Selalu</option>
            </select>
        </div>

        <div>
            <label>4. Seberapa sering Anda makan dalam jumlah besar dalam waktu singkat (misalnya dalam waktu 2 jam) selama tiga bulan terakhir?</label>
            <select name="question_4">
                <option value="Tidak pernah atau jarang">Tidak pernah atau jarang</option>
                <option value="Kadang-kadang">Kadang-kadang</option>
                <option value="Sering">Sering</option>
                <option value="Selalu">Selalu</option>
            </select>
        </div>

        <div>
            <label>5. Seberapa sering Anda merasa bersalah atau malu setelah makan berlebihan?</label>
            <select name="question_5">
                <option value="Tidak pernah atau jarang">Tidak pernah atau jarang</option>
                <option value="Kadang-kadang">Kadang-kadang</option>
                <option value="Sering">Sering</option>
                <option value="Selalu">Selalu</option>
            </select>
        </div>

        <div>
            <label>6. Seberapa sering Anda makan sendirian karena merasa malu atau malu makan di depan orang lain?</label>
            <select name="question_6">
                <option value="Tidak pernah atau jarang">Tidak pernah atau jarang</option>
                <option value="Kadang-kadang">Kadang-kadang</option>
                <option value="Sering">Sering</option>
                <option value="Selalu">Selalu</option>
            </select>
        </div>

        <div>
            <label>7. Seberapa sering Anda makan secara cepat selama tiga bulan terakhir?</label>
            <select name="question_7">
                <option value="Tidak pernah atau jarang">Tidak pernah atau jarang</option>
                <option value="Kadang-kadang">Kadang-kadang</option>
                <option value="Sering">Sering</option>
                <option value="Selalu">Selalu</option>
            </select>
        </div>
    </div>

    <button type="submit">Submit</button>
</form>

<script>
    document.querySelectorAll('input[name="question_1"]').forEach((element) => {
        element.addEventListener('change', (event) => {
            const additionalQuestions = document.getElementById('additional-questions');
            if (event.target.value === '1') {
                additionalQuestions.style.display = 'block';
            } else {
                additionalQuestions.style.display = 'none';
            }
        });
    });
</script>
@endsection
