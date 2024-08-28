<?php

namespace App\Models\aktifitas;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktifitas extends Model
{
    use HasFactory;

    protected $table = 'aktifitas';

    protected $fillable = ['nama', 'deskripsi','kategori'];

    public function users()
    {
        return $this->hasMany(app\Models\User::class, 'aktifitas_id');
    }
}
