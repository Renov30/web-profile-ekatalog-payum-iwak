<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Galeri;
use App\Models\Produk;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        // $jumlahLuas = Produk::sum('luas_lahan');
        // $jumlahKategoriProduk = KategoriProduk::count();
        // $jumlahLahan = Produk::count();
        // return view('front.index', compact('jumlahLuas', 'jumlahKategoriProduk', 'jumlahLahan'));
        return view('front.index');
    }

    public function data(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nama_petani', 'LIKE', "%{$search}%")
                ->orWhereHas('kategoriproduk', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhere('alamat', 'LIKE', "%{$search}%");
        }

        // Filter berdasarkan kategoriproduk jika ada
        if ($request->has('kategoriproduk') && !empty($request->kategoriproduk)) {
            $query->where('kategori_id', $request->kategoriproduk);
        }

        $semua = $query->paginate(8);
        $kategoriproduks = KategoriProduk::all(); // Ambil daftar kategoriproduk untuk dropdown

        return view('front.data', compact('semua', 'kategoriproduks'));
    }

    public function katalog(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nama_petani', 'LIKE', "%{$search}%")
                ->orWhereHas('kategoriproduk', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhere('alamat', 'LIKE', "%{$search}%");
        }

        // Filter berdasarkan kategoriproduk jika ada
        if ($request->has('kategoriproduk') && !empty($request->kategoriproduk)) {
            $query->where('kategori_id', $request->kategoriproduk);
        }

        $semua = $query->paginate(8);
        $kategoriproduks = KategoriProduk::all(); // Ambil daftar kategoriproduk untuk dropdown

        return view('front.katalog', compact('semua', 'kategoriproduks'));
    }

    public function detailProduk(Request $request)
    {
        $query = Produk::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('nama_petani', 'LIKE', "%{$search}%")
                ->orWhereHas('kategoriproduk', function ($q) use ($search) {
                    $q->where('name', 'LIKE', "%{$search}%");
                })
                ->orWhere('alamat', 'LIKE', "%{$search}%");
        }

        // Filter berdasarkan kategoriproduk jika ada
        if ($request->has('kategoriproduk') && !empty($request->kategoriproduk)) {
            $query->where('kategori_id', $request->kategoriproduk);
        }

        $semua = $query->paginate(8);
        $kategoriproduks = KategoriProduk::all(); // Ambil daftar kategoriproduk untuk dropdown

        return view('front.detail-produk', compact('semua', 'kategoriproduks'));
    }

    public function detail(Produk $produk, Request $request)
    {
        // Load relasi yang diperlukan
        $produk->load(['kategoriproduk', 'galeri', 'produksi']);

        // Ambil daftar tahun produksi unik
        $tahunProduksi = $produk->produksi
            ->map(fn($item) => \Carbon\Carbon::parse($item->tanggal_produksi)->year)
            ->unique()
            ->sort()
            ->values();

        // Ambil tahun yang dipilih dari request
        $tahunDipilih = $request->input('tahun');

        // Ambil data produksi dengan filter tahun jika ada
        $produksi = $produk->produksi()
            ->when($tahunDipilih, function ($query) use ($tahunDipilih) {
                return $query->whereYear('tanggal_produksi', $tahunDipilih);
            })
            ->orderBy('tanggal_produksi', 'asc')
            ->get();

        // Hitung total hasil produksi
        // $totalProduksi = $produksi->sum('hasil_produksi');

        // Ambil data produk lain (untuk tampilan sidebar atau rekomendasi)
        $semua = Produk::where('id', '!=', $produk->id)->get();

        return view('front.detail', compact('produk', 'semua', 'produksi', 'tahunProduksi', 'tahunDipilih', 'totalProduksi'));
    }

    public function peta(Request $request)
    {
        $query = Produk::select('id', 'name', 'slug', 'alamat', 'longitude', 'latitude', 'kategori_id');

        // Filter berdasarkan kategoriproduk jika ada
        if ($request->has('kategoriproduk') && !empty($request->kategoriproduk)) {
            $query->where('kategori_id', $request->kategoriproduk);
        }

        $lahans = $query->get();
        $kategoriproduks = KategoriProduk::all(); // Ambil daftar kategoriproduk untuk dropdown

        return view('front.peta', compact('lahans', 'kategoriproduks'));
    }
}
