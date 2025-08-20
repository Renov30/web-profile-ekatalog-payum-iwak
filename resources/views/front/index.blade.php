@extends('front.layouts.app')
@section('title', 'Home')
@section('content')
    <x-nav/>
    <!-- hero section start -->
     <section class="hero-gradient pt-36 pb-40 relative overflow-hidden">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center gap-10 md:gap-20">
          <div class="mb-10 lg:mb-0">
            <h1 class="text-5xl font-bold text-gray-900 mb-4 leading-tight">
              Perawatan Alami <br />
              <span class="text-blue-600">Nelayan Perempuan</span>
            </h1>
            <p class="text-lg text-gray-600 mb-8 max-w-lg leading-relaxed">
              Produk perawatan tubuh berbahan dasar alami hasil olahan Kelompok
              Usaha Perempuan Nelayan Payum. Ramah lingkungan, aman untuk kulit,
              dan mendukung pemberdayaan perempuan pesisir.
            </p>
            <div
              class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3"
            >
              <a
                href="#produk"
                class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 shadow-md"
              >
                Lihat Produk
              </a>
              <a
                href="#tentang"
                class="px-6 py-3 border border-transparent text-base font-medium rounded-md text-blue-600 bg-white hover:bg-gray-50 shadow-md"
              >
                Tentang Kami
              </a>
            </div>
          </div>
          <!-- <div class="relative">
            <img
              src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/d56d869b-ea34-465b-addd-e521945a6de8.png"
              alt="Kelompok perempuan nelayan sedang bekerja membuat produk sabun dan skincare dengan bahan alami di pantai"
              class="rounded-lg shadow-xl object-cover w-full h-auto"
            />
            <div
              class="absolute -bottom-4 -left-4 h-24 w-24 bg-blue-200 rounded-lg -z-10"
            ></div>
            <div
              class="absolute -top-4 -right-4 h-20 w-20 bg-yellow-200 rounded-lg -z-10"
            ></div>
          </div> -->
          <div class="md:w-1/2 grid grid-cols-2 grid-rows-2 gap-4">
            <div
              class="bg-blue-200 rounded-xl flex justify-center items-center p-6"
            >
              <img
                alt="Yellow sweatshirt with green circular logo on chest, displayed on light blue rounded square background"
                class="max-w-full max-h-full object-contain"
                height="120"
                src="img/1.png"
                width="120"
              />
            </div>
            <div
              class="bg-blue-300 rounded-xl flex justify-center items-center p-6"
            >
              <img
                alt="White tote bag with sunflower design, displayed on light pink rounded square background"
                class="max-w-full max-h-full object-contain"
                height="120"
                src="img/2.png"
                width="120"
              />
            </div>
            <div
              class="bg-blue-300 rounded-xl flex justify-center items-center p-6"
            >
              <img
                alt="White T-shirt with gray circle logo on chest, displayed on light yellow rounded square background"
                class="max-w-full max-h-full object-contain"
                height="120"
                src="img/2.png"
                width="120"
              />
            </div>
            <div
              class="bg-blue-200 rounded-xl flex justify-center items-center p-6"
            >
              <img
                alt="Light blue baseball cap with logo, displayed on light green rounded square background"
                class="max-w-full max-h-full object-contain"
                height="120"
                src="img/1.png"
                width="120"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- <div class="wave-divider">
        <svg
          data-name="Layer 1"
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 1200 120"
          preserveAspectRatio="none"
        >
          <path
            d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V0H0V27.35A600.21,600.21,0,0,0,321.39,56.44Z"
            class="fill-current text-white"
          ></path>
        </svg>
      </div> -->
    </section>

    <!-- hero section end -->
    <!-- about section start -->
    <section class="about" id="about">
      <h2><span>Tentang</span> Aplikasi</h2>

      <div class="row">
        
        <div class="content">
          <h3>Peta <span>Jagung</span></h3>
          <p>
            Aplikasi Peta Jagung adalah aplikasi berbasis website yang menyediakan informasi lahan jagung di sekitar wilayah kabupaten Merauke.
          </p>
          <p>
            Aplikasi ini bertujuan untuk memberikan kemudahan kepada Dinas Tanaman Pangan, Hortikultura dan Perkebunan Kabupaten Merauke dalam memberikan informasi mengenai lahan jagung yang ada di Merauke kepada investor dan masyarakat melalui Geographic Information System.
          </p>
        </div>
        <div class="about-img">
          <img src="{{asset('img/tentang-kami.jpg') }}" alt="Tentang Kami" />
        </div>
      </div>
    </section>
    <!-- about section end -->
    <!-- visi mis section start -->
    <section class="visi-misi">
      <h2><span>Tentang</span> Kami</h2>
      {{-- <p class="dinas">Dinas Tanaman Pangan, Hortikultura dan Perkebunan Kabupaten Merauke. </p> --}}
      <h3 class="visi">Visi</h3>
      <p>
        " Terwujudnya kabupaten merauke sebagai kawasan pertumbuhan ekonomi
        perbatasan yang strategis dengan mengoptimalkan sumber daya manusia
        dan sumber daya alam lokal melalui pertanian sebagai sektor utama "
      </p>
      <div class="row">
        <div class="visi-misi-img">
          <img src="{{asset('img/profil-kepala.jpg') }}" alt="Tentang Kami" />
        </div>

        <div class="content">
          <h3>Misi</h3>
              <ul>
                <li>
                  <span>1</span>
                  Peningkatan stabilitas wilayah dan peran sebagai daerah perbatasan
                </li>
                <li>
                  <span>2</span>
                  Peningkatan kapasitas kelembagaan pemerintahan dan wilayah pengembangan pada tingkat kampung, distrik dan kabupaten.
                </li>
                <li>
                  <span>3</span>
                  Pembentukan kota madya dan provinsi papua selatan</li>
                <li>
                  <span>4</span>
                  Pembangunan pertanian yang berorientasi pada perwujudan lumbung pangan untuk ketahanan pangan di tingkat nasional maupun internasional
                </li>
                <li>
                  <span>5</span>
                  Penguatan ekonomi daerah dan peluang investasi</li>
                <li>
                  <span>6</span>
                  Peningkatan kualitas sumber daya manusia sesuai pengembangan potensi daerah
                </li>
                <li>
                  <span>7</span>
                  Peningkatan kualitas pelayanan kesehatan sampai ke tingkat
                  kampung
                </li>
                <li>
                  <span>8</span>
                  Penguatan identitas budaya dan kearifan lokal.</li>
              </ul>
            </div>
          </div>
    </section>
    <!-- visi mis section end -->
    <!-- contact section start -->
        <section id="contact" class="contact">
          <h2><span>Informasi</span> Terkini</h2>
          <p>
            Dengan adanya Peta Jagung, data lahan jagung yang dikumpulkan oleh gapoktan dapat ditampilkan untuk diketahui semua orang.
          </p>
    
          <div class="row">
            <!-- From Uiverse.io by paesjr --> 
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <i data-feather="map"></i>
                <p>Jumlah Distrik</p>
                <br>
                <h1>{{$jumlahDistrik}}</h1>
              </div>
            </div>

            <!-- From Uiverse.io by paesjr --> 
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <i data-feather="map-pin"></i>
                <p>Jumlah Lahan</p>
                <br>
                <h1>{{$jumlahLahan}}</h1>
              </div>
            </div>
            <!-- From Uiverse.io by paesjr --> 
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <i data-feather="bar-chart-2"></i>
                <p>Luas Lahan</p>
                <br>
                <h1>{{$jumlahLuas}}h</h1>
              </div>
            </div>
            <!-- From Uiverse.io by paesjr --> 
            <div class="e-card playing">
              <div class="image"></div>

              <div class="wave"></div>
              <div class="wave"></div>
              <div class="wave"></div>

              <div class="infotop">
                <i data-feather="bar-chart"></i>
                <p>Jumlah Produksi</p>
                <br>
                <h1>{{$jumlahProduksi}}ton</h1>
              </div> 
            </div>
          </div>
        </section>
        <!-- contact section end -->
        {{-- build using section start --}}
        {{-- build using section end --}}
    <x-footer/>
@endsection
