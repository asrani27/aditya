<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama',
        'telp',
        'tanggal_bekerja',
    ];

    protected $casts = [
        'tanggal_bekerja' => 'date',
    ];
}
