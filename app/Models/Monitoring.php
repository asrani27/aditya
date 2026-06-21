<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Monitoring extends Model
{
    use HasFactory;

    protected $table = 'monitoring';

    protected $fillable = [
        'nomor_monitoring',
        'tanggal_monitoring',
        'proyek_id',
        'pegawai_id',
        'tahapan_pekerjaan',
        'detail_tugas',
        'tanggal_selesai',
        'status',
        'progress',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_monitoring' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Proyek::class);
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }
}