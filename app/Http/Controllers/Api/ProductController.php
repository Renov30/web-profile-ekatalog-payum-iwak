<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Produk::with('kategoriproduk', 'review', 'galeri')->get();

        return response()->json($product);
    }

    public function show($id)
    {
        $product = Produk::with('kategoriproduk', 'galeri')
            ->withAvg('review', 'rating')
            ->withCount('review')
            ->findOrFail($id);

        return response()->json($product);
    }
}
