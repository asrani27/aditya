<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PengeluaranDanaDetail extends Model
{
    use HasFactory;

    protected $table = 'pengeluaran_dana_detail';

    protected $fillable = [
        'pengeluaran_dana_id',
        'biaya_id',
        'kode',
        'nama',
        'deskripsi',
        'harga',
        'jumlah',
        'total',
    ];

    protected $casts = [
        'harga' => 'integer',
        'jumlah' => 'integer',
        'total' => 'integer',
    ];

    public function pengeluaranDana(): BelongsTo
    {
        return $this->belongsTo(PengeluaranDana::class, 'pengeluaran_dana_id');
    }

    public function biaya(): BelongsTo
    {
        return $this->belongsTo(Biaya::class);
    }
}