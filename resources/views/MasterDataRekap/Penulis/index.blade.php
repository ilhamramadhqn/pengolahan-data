@extends('layouts.app')

@section('content')
@include('sweetalert::alert')

<div class="container">
  <section class="section">
    <div class="section-header">
      <h1>Universitas Informatika dan Bisnis Indonesia</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h4>Data Penulis</h4>
              <div class="card-header-action">
                <a href="{{ route('Penulis.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table id="myTable" class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Artikel</th>
                        <th>Dosen</th>
                        <th>Mahasiswa</th>
                        <th>NO</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->artikel->judul_artikel}}</td>
                        @if($d->id_dosen == null)
                        <td> - </td>
                        @else
                        <td>{{$d->dosen->nama_dosen}}</td>
                        @endif
                        @if($d->id_mhs == null)
                        <td> - </td>
                        @else
                        <td>{{$d->mahasiswa->nama_mhs}}</td>
                        @endif
                        <td>{{$d->no}}</td>
                        <td>
                          <a href="Penulis/{{$d->id_penulis}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Penulis.destroy', $d->id_penulis)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertFunc();" type="submit"><i class="far fa-trash-alt text-white" data-feather="delete"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <script>
  function AllertFunc() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
</script>
</section>
</div>
@endsection