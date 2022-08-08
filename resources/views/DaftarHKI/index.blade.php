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
              <h4>Daftar HKI</h4>
              <div class="card-header-action">
                <a href="{{ route('HKI.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>No HKI</th>
                        <th>Judul HKI</th>
                        <th>Jenis HKI</th>
                        <th>Tanggal Permohonan</th>
                        <th class="text-center">File HKI</th>
                        <th class="text-center">Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->no_hki}}</td>
                        <td>{{$d->judul_hki}}</td>
                        <td>{{$d->jenishki->nama_jenis_hki}}</td>
                        <td>{{$d->tanggal_permohonan}}</td>
                        <td class="text-center">@if($d->file_hki != null)<a href="{{ asset('files/hki-files/' . $d->file_hki) }}" class="btn btn-outline-info">DOWNLOAD</a>@else Belum Upload HKI @endif</td>
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
                          <a href="HKI/{{$d->id_hki}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('HKI.destroy', $d->id_hki)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertFunc();" type="submit"><i class="far fa-trash-alt text-white" data-feather="delete"></i></button>
                          </form>
                          @if(Auth::user()->authority == "SUPERADMIN" || Auth::user()->authority == "ADMIN" || Auth::user()->authority == "DEKAN" )
                          @if($d->status == "P")
                          <form action="HKI/{{$d->id_hki}}/acc" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-icon btn-info btn-sm" onclick="return AllertAcc();" type="submit">Accept</button>
                          </form>
                          <form action="HKI/{{$d->id_hki}}/dec" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertDec();" type="submit">Decline</button>
                          </form>
                          @else
                          @endif
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