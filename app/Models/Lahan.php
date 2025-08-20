<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lahan extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'nama_petani',
        'slug',
        'luas_lahan',
        'distrik_id',
        'alamat',
        'no_hp',
        'longitude',
        'latitude',
        'thumbnail',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function distrik(): BelongsTo
    {
        return $this->belongsTo(Distrik::class, 'distrik_id');
    }

    public function galeri(): HasMany
    {
        return $this->hasMany(Galeri::class, 'lahan_id');
    }

    public function produksi(): HasMany
    {
        return $this->hasMany(Produksi::class, 'lahan_id');
    }
}
