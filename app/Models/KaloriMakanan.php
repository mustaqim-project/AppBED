<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaloriMakanan extends Model
{
    use HasFactory;

    protected $table = 'kalori_makanan';

    protected $fillable = ['nama_makanan', 'kalori_per_gram'];
}
