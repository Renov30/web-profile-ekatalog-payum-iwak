<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    //
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'kategori_id',
        'harga',
        'diskon',
        'bahan_utama',
        'manfaat',
        'spesifikasi',
        'keunggulan',
        'penggunaan',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function kategoriproduk(): BelongsTo
    {
        return $this->belongsTo(KategoriProduk::class, 'kategori_id');
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class, 'product_id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'product_id');
    }

    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : asset('images/default.png');
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'produk_id');
    }

    public function bahanBakus()
    {
        return $this->belongsToMany(BahanBaku::class, 'produk_bahan_bakus')
            ->withPivot('kuantitas_per_unit');
    }

    public function produkBahanBakus()
    {
        return $this->hasMany(ProdukBahanBaku::class, 'produk_id');
    }
}
