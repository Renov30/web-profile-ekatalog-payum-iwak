<a href="{{route('front.detail', $data->slug)}}">
    <div class="card">
      <img src="{{Storage::url($data->thumbnail)}}" />
      <div class="card-content">
        <p class="nama-petani">{{$data->name}}</p>
        <p>Nama Petani : {{$data->nama_petani}}</p>
        <p>Distrik : {{$data->distrik->name}}</p>
        <p>Alamat : {{$data->alamat}}</p>
      </div>
    </div>
  </a>