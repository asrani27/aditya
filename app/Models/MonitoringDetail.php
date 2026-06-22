<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MonitoringDetail extends Model
{
    use HasFactory;

    protected $table = 'monitoring_detail';

    protected $fillable = [
        'monitoring_id',
        'parameter',
        'progress',
    ];

    protected $casts = [
        'progress' => 'integer',
    ];

    public function monitoring(): BelongsTo
    {
        return $this->belongsTo(Monitoring::class);
    }
}
