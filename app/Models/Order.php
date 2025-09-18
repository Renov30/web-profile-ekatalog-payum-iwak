<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'no_hp',
        'alamat',
        'status',
        'tanggal_order',
        'catatan',
        'harga_total',
    ];

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }

    public function production()
    {
        return $this->hasOne(OrderProduction::class, 'order_id');
    }
}
