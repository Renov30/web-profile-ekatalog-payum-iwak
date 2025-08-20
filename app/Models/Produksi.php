<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produksi extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'lahan_id',
        'tanggal_produksi',
        'hasil_produksi',
    ];

    public function lahan(): BelongsTo
    {
        return $this->belongsTo(Lahan::class, 'lahan_id');
    }
}
