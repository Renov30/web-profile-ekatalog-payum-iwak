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
        if ($stages->isEmpty() || !$this->tanggal_mulai) {
            return [
                'stage' => null,
                'persentase_progress' => 0,
                'hari_berjalan' => 0,
            ];
        }

        $totalDurasi = $stages->sum('durasi');
        $daysElapsed = Carbon::parse($this->tanggal_mulai)->diffInDays(now(), false);

        if ($daysElapsed < 0) {
            return [
                'stage' => 'Belum Mulai',
                'persentase_progress' => 0,
                'hari_berjalan' => 0,
            ];
        }

        // pastikan integer (tanpa koma)
        $daysElapsed = (int) $daysElapsed;

        $hariBerjalan = $daysElapsed + 1;

        // Kalau sudah lewat dari total durasi → selesai
        if ($daysElapsed >= $totalDurasi) {
            return [
                'stage' => 'Selesai',
                'persentase_progress' => 100,
                'hari_berjalan' => $hariBerjalan,
            ];
        }

        $accumulated = 0;
        $currentStage = $stages->last();
        foreach ($stages as $stage) {
            $accumulated += $stage->durasi;
            if ($daysElapsed < $accumulated) {
                $currentStage = $stage;
                break;
            }
        }

        $progressPercent = min(100, ($daysElapsed / $totalDurasi) * 100);

        return [
            'stage' => $currentStage->name,
            'persentase_progress' => round($progressPercent, 2),
            'hari_berjalan' => $hariBerjalan,
        ];
    }
}
