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
        'product_id',
        'gambar',
    ];

    public function produk(): BelongsTo
    {
        return $this->belongsTo(Produk::class, 'product_id');
    }
}
