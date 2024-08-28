<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('daily_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->date('date');
            $table->boolean('question_1');
            $table->boolean('question_2')->nullable();
            $table->enum('question_3', ['Tidak pernah atau jarang', 'Kadang-kadang', 'Sering', 'Selalu'])->nullable();
            $table->enum('question_4', ['Tidak pernah atau jarang', 'Kadang-kadang', 'Sering', 'Selalu'])->nullable();
            $table->enum('question_5', ['Tidak pernah atau jarang', 'Kadang-kadang', 'Sering', 'Selalu'])->nullable();
            $table->enum('question_6', ['Tidak pernah atau jarang', 'Kadang-kadang', 'Sering', 'Selalu'])->nullable();
            $table->enum('question_7', ['Tidak pernah atau jarang', 'Kadang-kadang', 'Sering', 'Selalu'])->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('daily_entries');
    }
}
