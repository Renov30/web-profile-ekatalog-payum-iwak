<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BahanBaku extends Model
{

    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'satuan',
        'stok',
    ];

    public function produks()
    {
        return $this->belongsToMany(Produk::class, 'produk_bahan_bakus')
            ->withPivot('kuantitas_per_unit');
    }

    public function produkBahanBakus()
    {
        return $this->hasMany(ProdukBahanBaku::class, 'bahan_baku_id');
    }
}
