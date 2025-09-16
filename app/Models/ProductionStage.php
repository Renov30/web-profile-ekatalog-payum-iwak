<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductionStage extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'urutan',
        'durasi',
    ];

    // Relasi ke order production yang sedang berada di stage ini
    public function orderProductions()
    {
        return $this->hasMany(OrderProduction::class, 'current_stage', 'urutan_stage');
    }
}
