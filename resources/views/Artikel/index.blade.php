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
              <h4>Daftar Artikel</h4>
              <div class="card-header-action">
                <a href="{{ route('Artikel.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Jurnal</th>
                        <th>Penelitian</th>
                        <th>Semester</th>
                        <th>Volume</th>
                        <th>No Jurnal</th>
                        <th>Tanggal</th>
                        <th>Link</th>
                        <th>File Artikel</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td> 
                        <td>{{$d->judul_artikel}}</td>
                        <td>{{$d->jurnal->nama_jurnal}}</td>
                        <td>{{$d->penelitian->judul_penelitian}}</td>
                        <td>{{$d->semester->nama_semester}}</td>
                        <td>{{$d->volume}}</td>
                        <td>{{$d->no_jurnal}}</td>
                        <td>{{$d->tanggal}}</td>
                        <td><a href="{{$d->link}}">{{$d->link}}</a></td>
                        <td>@if($d->file_artikel != null)<a href="{{ asset('files/artikel-files/' . $d->file_artikel) }}" class="btn btn-outline-info">DOWNLOAD</a>@else - @endif</td>
                        <td class="text-center">
                        @if($d->status == "P")
                        <a class="edit btn btn-icon btn-warning btn-sm align-center">Menunggu Persetujuan</a>
                        @elseif($d->status == "T")
                        <a class="edit btn btn-icon btn-success btn-sm align-center">Diterima</a>
                        @else
                        <a class="edit btn btn-icon btn-danger btn-sm align-center" >Ditolak</a>
                        @endif
                        </td>
                        <td>
                          <a href="Artikel/{{$d->id_artikel}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Artikel.destroy', $d->id_artikel)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertFunc();" type="submit"><i class="far fa-trash-alt text-white" data-feather="delete"></i></button>
                          </form>
                          @if($d->status == "P")
                          <form action="Artikel/{{$d->id_artikel}}/acc" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-icon btn-info btn-sm" onclick="return AllertAcc();" type="submit">Accept</button>
                          </form>
                          <form action="Artikel/{{$d->id_artikel}}/dec" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertDec();" type="submit">Decline</button>
                          </form>
                          @else
                          @endif
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
  function AllertAcc() {
      if(!confirm("Are You Sure to accept this"))
      event.preventDefault();
  }
  function AllertDec() {
      if(!confirm("Are You Sure to decline this"))
      event.preventDefault();
  }
</script>
</section>
</div>
@endsection