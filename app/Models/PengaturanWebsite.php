<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PengaturanWebsite extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'name',
        'logo',
        'deskripsi_umkm',
        'alamat',
        'email',
        'no_hp',
        'facebook',
        'instagram',
        'twitter',
        'meta_title',
        'meta_keyword',
        'meta_description',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }
}
