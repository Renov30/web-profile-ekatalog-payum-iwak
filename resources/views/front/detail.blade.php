@extends('front.layouts.app')
@section('title', 'Detail')
@section('content')
    <body>
        <x-nav/>
        <!-- content section start -->
        <section class="detail">
            <h2>Detail Lahan</h2>
            <div class="row">
                <div id="map"></div>
                <script>
                    var activeInfoWindow = null; 

                    function initMap() {
                        var lahan = {
                            name: "{{ $lahan->name }}",
                            alamat: "{{ $lahan->alamat }}",
                            slug: "{{ $lahan->slug }}",
                            latitude: {{ $lahan->latitude }},
                            longitude: {{ $lahan->longitude }}
                        };

                        var lokasi = { lat: lahan.latitude, lng: lahan.longitude };

                        var map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 15,
                            center: lokasi,
                        });

                        var marker = new google.maps.Marker({
                            position: lokasi,
                            map: map,
                            title: lahan.name,
                            icon: {
                                url: "{{ asset('img/corn-cob.png') }}", 
                                scaledSize: new google.maps.Size(30, 30),
                            } 
                        });

                        
                        var contentString =
                            '<div class="card-google-map">' +
                                '<h5 class="card-title-google-map">' + lahan.name + '</h5>' +
                                '<p class="card-text-google-map">' + lahan.alamat + '</p>' +
                                '<a href="https://www.google.com/maps?q=' + lahan.latitude + ',' + lahan.longitude + '" target="_blank" class="card-button-google-map">Lihat di Google Maps</a>' +
                            '</div>';

                        var infowindow = new google.maps.InfoWindow({
                            content: contentString
                        });

                        marker.addListener('click', function() {
                            if (activeInfoWindow) {
                                activeInfoWindow.close();
                            }
                            infowindow.open(map, marker);
                            activeInfoWindow = infowindow;
                        });

                        google.maps.event.addListener(map, 'click', function() {
                            if (activeInfoWindow) {
                                activeInfoWindow.close();
                                activeInfoWindow = null;
                            }
                        });
                    }

                </script>

                <div class="teks">
                    <table>
                        <tr>
                            <td>Nama Lahan</td>
                            <td>:</td>
                            <td>{{$lahan->name}}</td>
                        </tr>
                        <tr>
                            <td>Nama Petani</td>
                            <td>:</td>
                            <td>{{$lahan->nama_petani}}</td>
                        </tr>
                        {{-- <tr>
                            <td>Hasil Produksi</td>
                            <td>:</td>
                            <td>{{$lahan->produksi()->latest()->first()?->hasil_produksi ?? 'Belum ada data'}}</td>
                        </tr> --}}
                        <tr>
                            <td>Luas Lahan</td>
                            <td>:</td>
                            <td>{{$lahan->luas_lahan}} hektar</td>
                        </tr>
                        <tr>
                            <td>Distrik</td>
                            <td>:</td>
                            <td>{{$lahan->distrik->name}}</td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td>{{$lahan->alamat}}</td>
                        </tr>
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>{{$lahan->no_hp}}</td>
                        </tr>
                        <tr>
                            <td>Latitude</td>
                            <td>:</td>
                            <td>{{$lahan->latitude}}</td>
                        </tr>
                        <tr>
                            <td>Longitude</td>
                            <td>:</td>
                            <td>{{$lahan->longitude}}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="teks-data">
                <div class="flex justify-between pb-2 items-center">
                    <h3>Data Produksi</h3>
                    <form method="GET" action="" class="">
                        <label for="tahun" class="text-md">Pilih Tahun:</label>
                        <select name="tahun" id="tahun" onchange="this.form.submit()" class="rounded-md ml-2 focus:ring-0 focus:outline-none focus:border-gray-500 border border-gray-300">
                            <option value="">Semua Tahun</option>
                            @foreach ($tahunProduksi as $tahun)
                                <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                    {{ $tahun }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div>
                
                <table border="1" cellpadding="5" class="border border-slate-300 ">
                    <thead>
                        <tr>
                            <th class="font-medium">Tanggal Produksi</th>
                            <th class="font-medium">Hasil Produksi (Ton)</th>
                            <th class="font-medium">Kuartal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produksi as $item)
                            @php
                                $bulan = \Carbon\Carbon::parse($item->tanggal_produksi)->month;
                                $kuartal = ceil($bulan / 3);
                            @endphp
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->tanggal_produksi)->translatedFormat('d F Y') }}</td>
                                <td>{{ $item->hasil_produksi }}</td>
                                <td>Kuartal {{ $kuartal }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2" class="font-medium">Total Hasil Produksi</td>
                            <td class="font-medium">{{ $totalProduksi }} Ton</td>
                        </tr>
                    </tfoot>
                </table>
                
            </div>
            
        </section>
        <!-- content section end -->
        <!-- gallery section start -->
        <section class="photos">
            <h3>Foto Lahan</h3>
            <div class="gallery" id="gallery">
                @forelse ($lahan->galeri as $foto)
                <x-galeri-card :data="$foto"/>
              @empty
                <p>Belum ada foto lahan</p>
              @endforelse
            </div>
            @if ($lahan->galeri->count() > 4)
                <div class="show-more" onclick="toggleGallery()">Show More</div>
            @endif
        </section>
        <!-- lightbox start -->
        <div class="lightbox" id="lightbox">
            <span onclick="closeLightbox()">×</span>
            <img id="lightbox-img" alt="Enlarged view of the selected image" />
        </div>
        <!-- lightbox end -->

        <!-- gallery section end -->
        <!-- other content start -->
        <section class="other">
            <h3>Lahan Lainnya</h3>
            <!-- card view -->
            <div class="grid" id="cardView">
                @forelse ($semua->take(4) as $lahan) {{-- Ambil hanya 4 data --}}
                    <x-data-card :data="$lahan"/>
                @empty
                    <p>Belum ada data lahan</p>
                @endforelse
            </div>
        
            @if($semua->count() > 4) {{-- Tampilkan tombol jika ada lebih dari 4 data --}}
                <div class="text-right mt-3">
                    <a href="{{ route('front.data') }}" class="btn btn-primary text-sm hover:underline">Lihat Lebih Banyak</a>
                </div>
            @endif
        </section>
        <!-- other content end -->
       <x-footer/>
@endsection
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('css/filament/lightbox.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/filament/other.css') }}" />
@endpush
@push('after-scripts')
    <script
        async
        defer
        src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAPS_API_KEY')}}&callback=initMap"
    ></script>
@endpush
