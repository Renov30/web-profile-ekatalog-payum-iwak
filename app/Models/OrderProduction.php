<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderProduction extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'id_order',
        'id_stage',
        'tanggal_mulai',
        'waktu_total_produksi',
        'persentase_progress',
    ];

    // Relasi ke Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'id_order');
    }

    // Relasi ke ProductionStage (stage saat ini)
    public function stage()
    {
        return $this->belongsTo(ProductionStage::class, 'id_stage');
    }

    // Accessor untuk menghitung stage dan progress otomatis
    public function getProgressAttribute()
    {
        $stages = ProductionStage::orderBy('urutan')->get();
        $totalDays = $stages->sum('durasi');
        $daysElapsed = Carbon::now()->diffInDays(Carbon::parse($this->start_date));

        $accumulated = 0;
        $currentStage = 1;
        foreach ($stages as $stage) {
            $accumulated += $stage->durasi_hari;
            if ($daysElapsed < $accumulated) {
                $currentStage = $stage->urutan_stage;
                break;
            }
        }

        $progressPercent = min(100, ($daysElapsed / $totalDays) * 100);

        return [
            'persentase_progress' => $progressPercent
        ];
    }
}
