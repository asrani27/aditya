<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PengeluaranDana extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran_dana';

    protected $fillable = [
        'nota',
        'tanggal',
        'proyek_id',
        'pegawai_id',
        'total',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'total' => 'integer',
    ];

    public function proyek(): BelongsTo
    {
        return $this->belongsTo(Proyek::class);
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(PengeluaranDanaDetail::class, 'pengeluaran_dana_id');
    }
}