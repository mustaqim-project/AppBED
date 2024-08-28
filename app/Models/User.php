<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tanggal_lahir',
        'tinggi_badan',
        'berat_badan',
        'jenis_kelamin',
        'username',
        'email',
        'password',
        'aktifitas_id',
        'gambar',
        'role', // Tambahkan kolom role
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_lahir' => 'date',
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the activity that owns the user.
     */
    public function aktifitas()
    {
        return $this->belongsTo(\App\Models\Aktifitas::class, 'aktifitas_id');
    }

    public function weights()
    {
        return $this->hasMany(UserWeight::class);
    }

    public function dailyEntries()
    {
        return $this->hasMany(DailyEntry::class);
    }

    /**
     * Check if the user has the specified role.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }
}
