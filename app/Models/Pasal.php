<?php

namespace App\Models;

use App\Enums\StatusPasal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pasal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pasal',
        'isi_pasal',
        'tanggal_berlaku',
        'pasal_category_id',
        'status_pasal',
    ];

    protected $casts = [
        'tanggal_berlaku' => 'date',
        'status_pasal' => StatusPasal::class,
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PasalCategory::class, 'pasal_category_id');
    }
}