<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerimaanDana extends Model
{
    use HasFactory;

    protected $table = 'penerimaan_dana';

    protected $fillable = [
        'no_kwitansi',
        'tanggal',
        'proyek_id',
        'pegawai_id',
        'dana_diterima',
        'keterangan',
    ];

    protected $casts = [
        'dana_diterima' => 'integer',
        'tanggal' => 'date',
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
