<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeri extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'lahan_id',
        'gambar',
    ];

    public function lahan(): BelongsTo
    {
        return $this->belongsTo(Lahan::class, 'lahan_id');
    }
}
