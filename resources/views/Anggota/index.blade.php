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
              <h4>Data Anggota</h4>
              <div class="card-header-action">
                <a href="{{ route('Anggota.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Mahasiswa</th>
                        <th>Dosen</th>
                        <th>Penelitian</th>
                        <th>NO</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->mahasiswa->nama_mhs}}</td>
                        <td>{{$d->dosen->nama_dosen}}</td>
                        <td>{{$d->penelitian->judul_penelitian}}</td>
                        <td>{{$d->no}}</td>
                        <td>
                          <a href="Anggota/{{$d->id_anggota}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Anggota.destroy', $d->id_anggota)}}" method="post">
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