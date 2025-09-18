<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function kirimPesan(Request $request)
    {
        $cart = session('cart', []);
        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

        // gabungkan alamat
        $alamat = $request->alamat;
        if ($request->kota) $alamat .= ', ' . $request->kota;
        if ($request->provinsi) $alamat .= ', ' . $request->provinsi;
        if ($request->kode_pos) $alamat .= ' ' . $request->kode_pos;

        // simpan order
        $order = Order::create([
            'name'          => $request->nama,
            'no_hp'         => $request->no_hp,
            'alamat'        => $alamat,
            'status'        => 'menunggu konfirmasi',
            'tanggal_order' => now(),
            'catatan'       => $request->catatan,
            'harga_total'   => $total,
        ]);

        // simpan order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'  => $order->id,
                'produk_id' => $item['id'],   // pastikan cart punya 'id'
                'kuantitas' => $item['quantity'],
            ]);
        }

        // buat pesan WA
        $message = $request->wa_message ?? ''; // ambil pesan dari form

        $wanumber = '6281343026394'; // ganti dengan nomor tujuan
        $waUrl = "https://wa.me/{$wanumber}?text=" . urlencode($message);

        return redirect($waUrl);
    }
}
