@extends('front.layouts.app')
@section('title', 'Data')
@section('content')
    <x-nav/>
    <!-- photo grid start -->
    <section class="photo-grid">
      <h2>Data Lahan <span>Jagung</span></h2>
      <p class="info">
        Kumpulan data lahan jagung di sekitar Kabupaten Merauke yang telah terdata.
      </p>

      <div class="top-bar">
        <!-- search bar -->
        <form action="{{ route('front.data') }}" method="GET" class="search">
          <input type="text" placeholder="Search.." name="search" value="{{ request('search') }}" />
          <button type="submit"><i data-feather="search"></i></button>
      </form>
      {{-- filter dropdown --}}
      <div class="flex items-center gap-3">
      <form action="{{ route('front.data') }}" method="GET" class="filter-distrik">
        <select name="distrik" onchange="this.form.submit()">
          <option value="">Pilih Distrik</option>
          @foreach($distriks as $distrik)
          <option value="{{ $distrik->id }}" {{ request('distrik') == $distrik->id ? 'selected' : '' }}>
            {{ $distrik->name }}
          </option>
          @endforeach
        </select>
      </form>
      <!-- toggle button -->
      <button class="toggleBtn" id="toggleViewBtn">
        <i data-feather="image"></i>
      </button>
    </div>
      </div>

      <!-- card view -->
      <div class="grid" id="cardView">
        @forelse ($semua as $lahan)
          <x-data-card :data="$lahan"/>
        @empty
          <p>Belum ada data lahan</p>
        @endforelse
      </div>
      <!-- table view start -->
      <div class="hidden" id="tableView">
        <table>
          <thead>
            <tr>
              <th>Foto</th>
              <th>Nama Lahan</th>
              <th>Nama Petani</th>
              <th>Distrik</th>
              <th>Alamat</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse ($semua as $lahan)
              <x-data-table :data="$lahan"/>              
            @empty
              <p>Belum ada data lahan</p>
            @endforelse
          </tbody>
        </table>
      </div>
      <!-- table view end -->
      {{-- pagination start --}}
      <div class=" mt-5 w-full text-right">
        {{ $semua->links() }}
    </div>
      {{-- pagination end --}}
    </section>
    <!-- photo grid end -->
   <x-footer/>
@endsection
