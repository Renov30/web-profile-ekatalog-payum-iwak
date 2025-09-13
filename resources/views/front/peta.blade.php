@extends('front.layouts.app')
@section('title', 'Peta')
@section('content')
    <x-nav />
    <!-- content start -->
    <section class="content-peta">
        <h2>Peta <span>Produk</span></h2>
        <p>
            Tampilan penyebaran produk jagung di sekitar Kabupaten Merauke yang telah terdata.
        </p>
        <!-- Filter KategoriProduk -->
        <div class="top-peta">
            <form action="{{ route('front.peta') }}" method="GET" class="filter-kategoriproduk">
                <select name="kategoriproduk" onchange="this.form.submit()">
                    <option value="">Pilih KategoriProduk</option>
                    @foreach ($kategoriproduks as $kategoriproduk)
                        <option value="{{ $kategoriproduk->id }}"
                            {{ request('kategoriproduk') == $kategoriproduk->id ? 'selected' : '' }}>
                            {{ $kategoriproduk->name }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>

        <div class="row">
            <div id="map"></div>
            <script>
                function initMap() {
                    var lokasi = {
                        lat: -8.4975434,
                        lng: 140.3882068
                    };
                    var map = new google.maps.Map(
                        document.getElementById("map"), {
                            zoom: 10,
                            center: lokasi,
                        }
                    );

                    var marker = new google.maps.Marker({
                        position: lokasi,
                        map: map,
                    });
                }
            </script>
        </div>
    </section>
    <!-- content section end -->
    <x-footer />
@endsection
@push('after-scripts')
    <script>
        function initMap() {
            var mapOptions = {
                zoom: 12,
                center: {
                    lat: -8.4975434,
                    lng: 140.3882068
                },
            };

            var map = new google.maps.Map(document.getElementById("map"), mapOptions);
            var activeInfoWindow = null;

            var locations = @json($lahans);

            locations.forEach(function(produk) {
                var position = new google.maps.LatLng(produk.latitude, produk.longitude);

                var contentString =
                    '<div class="card-google-map">' +
                    '<h5 class="card-title-google-map">' + produk.name + '</h5>' +
                    '<p class="card-text-google-map">' + produk.alamat + '</p>' +
                    '<a href="/data/detail-produk/' + produk.slug +
                    '" class="card-button-google-map">Lihat Detail</a>' +
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                var marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    title: produk.name,
                    icon: {
                        url: "{{ asset('img/corn-cob.png') }}",
                        scaledSize: new google.maps.Size(30, 30),
                    }
                });

                marker.addListener('click', function() {
                    if (activeInfoWindow) {
                        activeInfoWindow.close();
                    }
                    // map.setZoom(15);
                    // map.setCenter(marker.getPosition());
                    infowindow.open(map, marker);
                    activeInfoWindow = infowindow;
                });

                google.maps.event.addListener(map, 'click', function() {
                    if (activeInfoWindow) {
                        activeInfoWindow.close();
                        activeInfoWindow = null;
                    }
                });
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap">
    </script>
@endpush
