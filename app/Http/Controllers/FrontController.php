<?php

namespace App\Http\Controllers;

use App\Models\Distrik;
use App\Models\Galeri;
use App\Models\Lahan;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $jumlahLuas = Lahan::sum('luas_lahan');
        // $jumlahProduksi = Lahan::sum('hasil_produksi');
        $jumlahDistrik = Distrik::count();
        $jumlahLahan = Lahan::count();
        $jumlahProduksi = Lahan::join('produksis', 'lahans.id', '=', 'produksis.lahan_id')
            ->selectRaw('SUM(produksis.hasil_produksi) as total_produksi')
            ->value('total_produksi'); // Ambil satu nilai total saja
        return view('front.index', compact('jumlahLuas', 'jumlahProduksi', 'jumlahDistrik', 'jumlahLahan'));
    }

    public function data(Request $request)
    {
        $query = Lahan::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nama_petani', 'LIKE', "%{$search}%")
                ->orWhereHas('distrik', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhere('alamat', 'LIKE', "%{$search}%");
        }

        // Filter berdasarkan distrik jika ada
        if ($request->has('distrik') && !empty($request->distrik)) {
            $query->where('distrik_id', $request->distrik);
        }

        $semua = $query->paginate(8);
        $distriks = Distrik::all(); // Ambil daftar distrik untuk dropdown

        return view('front.data', compact('semua', 'distriks'));
    }

    public function detail(Lahan $lahan, Request $request)
    {
        // Load relasi yang diperlukan
        $lahan->load(['distrik', 'galeri', 'produksi']);

        // Ambil daftar tahun produksi unik
        $tahunProduksi = $lahan->produksi
            ->map(fn($item) => \Carbon\Carbon::parse($item->tanggal_produksi)->year)
            ->unique()
            ->sort()
            ->values();

        // Ambil tahun yang dipilih dari request
        $tahunDipilih = $request->input('tahun');

        // Ambil data produksi dengan filter tahun jika ada
        $produksi = $lahan->produksi()
            ->when($tahunDipilih, function ($query) use ($tahunDipilih) {
                return $query->whereYear('tanggal_produksi', $tahunDipilih);
            })
            ->orderBy('tanggal_produksi', 'asc')
            ->get();

        // Hitung total hasil produksi
        $totalProduksi = $produksi->sum('hasil_produksi');

        // Ambil data lahan lain (untuk tampilan sidebar atau rekomendasi)
        $semua = Lahan::where('id', '!=', $lahan->id)->get();

        return view('front.detail', compact('lahan', 'semua', 'produksi', 'tahunProduksi', 'tahunDipilih', 'totalProduksi'));
    }

    public function peta(Request $request)
    {
        $query = Lahan::select('id', 'name', 'slug', 'alamat', 'longitude', 'latitude', 'distrik_id');

        // Filter berdasarkan distrik jika ada
        if ($request->has('distrik') && !empty($request->distrik)) {
            $query->where('distrik_id', $request->distrik);
        }

        $lahans = $query->get();
        $distriks = Distrik::all(); // Ambil daftar distrik untuk dropdown

        return view('front.peta', compact('lahans', 'distriks'));
    }
}
