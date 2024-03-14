<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Lokasi extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'lokasi';
    protected $primaryKey = 'lokasi_id';   
    
    protected $fillable = [
        'lokasi_id',
        'nama_lokasi',
        'alamat_lokasi',
        'telepon',
    ];

    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
