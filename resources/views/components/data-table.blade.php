<tr>
    <td>
        <img src="{{ Storage::url($data->thumbnail) }}" />
    </td>
    <td>
        <p class="nama-petani">Produk Pak {{ $data->name }}</p>
    </td>
    <td>
        <p>{{ $data->name }}</p>
    </td>
    <td>
        <p>{{ $data->kategoriproduk->name }}</p>
    </td>
    <td>
        <p>{{ $data->alamat }}</p>
    </td>
    <td>
        <p>
            <a href="{{ route('front.detail', $data->slug) }}"><button>Lihat Detail</button></a>
        </p>
    </td>
</tr>
