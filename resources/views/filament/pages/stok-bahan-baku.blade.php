<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Tabel 5 --}}
        <div class="overflow-x-auto">
            <h2 class="text-base font-bold mb-2">Produksi Total</h2>
            <table class="w-full border dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Produk</th>
                        <th class="px-4 py-2 border">Jumlah Dipesan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        <tr>
                            <td class="border px-4 py-2">{{ $produk->name }}</td>
                            <td class="border px-4 py-2">{{ $produk->order_item_sum_kuantitas ?? 0 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Tabel 6 --}}
        <div class="overflow-x-auto">
            <h2 class="text-base font-bold mb-2">Total Bahan Dibutuhkan</h2>
            <table class="w-full border dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
                    <tr>
                        <th class="px-4 py-2 border">Bahan</th>
                        <th class="px-4 py-2 border">Kuantitas Dibutuhkan</th>
                        <th class="px-4 py-2 border">Satuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produks as $produk)
                        @foreach ($produk->bahanBakus as $bahan)
                            <tr>
                                <td class="border px-4 py-2">{{ $bahan->name }}</td>
                                <td class="border px-4 py-2">
                                    {{ ($produk->order_item_sum_kuantitas ?? 0) * $bahan->pivot->kuantitas_per_unit }}
                                </td>
                                <td class="border px-4 py-2">{{ $bahan->satuan }}</td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Tabel 1: Bahan Baku Sabun --}}
    <h2 class="text-base font-bold mb-2">Bahan Baku Sabun Kopi</h2>
    <table class="min-w-full border dark:border-gray-700 mb-6">
        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <tr>
                <th class="px-4 py-2 border">Bahan</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks->where('name', 'Sabun Kopi') as $produk)
                @foreach ($produk->bahanBakus as $bahan)
                    <tr>
                        <td class="border px-4 py-2">{{ $bahan->name }}</td>
                        <td class="border px-4 py-2">
                            {{ fmod($bahan->pivot->kuantitas_per_unit, 1) == 0
                                ? number_format($bahan->pivot->kuantitas_per_unit, 0)
                                : rtrim(rtrim(number_format($bahan->pivot->kuantitas_per_unit, 2), '0'), '.') }}
                        </td>
                        <td class="border px-4 py-2">{{ $bahan->satuan }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    {{-- Tabel 2: Bahan Baku Body Scrub --}}
    <h2 class="text-base font-bold mb-2">Bahan Baku Body Scrub</h2>
    <table class="min-w-full border dark:border-gray-700 mb-6">
        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <tr>
                <th class="px-4 py-2 border">Bahan</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks->where('name', 'Body Scrub') as $produk)
                @foreach ($produk->bahanBakus as $bahan)
                    <tr>
                        <td class="border px-4 py-2">{{ $bahan->name }}</td>
                        <td class="border px-4 py-2">
                            {{ fmod($bahan->pivot->kuantitas_per_unit, 1) == 0
                                ? number_format($bahan->pivot->kuantitas_per_unit, 0)
                                : rtrim(rtrim(number_format($bahan->pivot->kuantitas_per_unit, 2), '0'), '.') }}
                        </td>
                        <td class="border px-4 py-2">{{ $bahan->satuan }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    {{-- Tabel 3: Bahan Baku Lip Balm --}}
    <h2 class="text-base font-bold mb-2">Bahan Baku Lip Balm</h2>
    <table class="min-w-full border dark:border-gray-700 mb-6">
        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <tr>
                <th class="px-4 py-2 border">Bahan</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks->where('name', 'Lip Balm') as $produk)
                @foreach ($produk->bahanBakus as $bahan)
                    <tr>
                        <td class="border px-4 py-2">{{ $bahan->name }}</td>
                        <td class="border px-4 py-2">
                            {{ fmod($bahan->pivot->kuantitas_per_unit, 1) == 0
                                ? number_format($bahan->pivot->kuantitas_per_unit, 0)
                                : rtrim(rtrim(number_format($bahan->pivot->kuantitas_per_unit, 2), '0'), '.') }}
                        </td>
                        <td class="border px-4 py-2">{{ $bahan->satuan }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>

    {{-- Tabel 4: Bahan Baku Body Butter --}}
    <h2 class="text-base font-bold mb-2">Bahan Baku Body Butter</h2>
    <table class="min-w-full border dark:border-gray-700 mb-6">
        <thead class="bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-gray-100">
            <tr>
                <th class="px-4 py-2 border">Bahan</th>
                <th class="px-4 py-2 border">Jumlah</th>
                <th class="px-4 py-2 border">Satuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produks->where('name', 'Body Butter') as $produk)
                @foreach ($produk->bahanBakus as $bahan)
                    <tr>
                        <td class="border px-4 py-2">{{ $bahan->name }}</td>
                        <td class="border px-4 py-2">
                            {{ fmod($bahan->pivot->kuantitas_per_unit, 1) == 0
                                ? number_format($bahan->pivot->kuantitas_per_unit, 0)
                                : rtrim(rtrim(number_format($bahan->pivot->kuantitas_per_unit, 2), '0'), '.') }}
                        </td>
                        <td class="border px-4 py-2">{{ $bahan->satuan }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</x-filament::page>
