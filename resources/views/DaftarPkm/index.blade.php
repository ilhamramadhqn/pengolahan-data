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
              <h4>Daftar PKM</h4>
              <div class="card-header-action">
                <a href="{{ route('PkmImportForm') }}" class="btn btn-success">Import Data</a>
                <a href="{{ route('PkmExport') }}" class="btn btn-danger">Export Data</a>
                <a href="{{ route('Pengabdian-Masyarakat.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table id="myTable" class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Kegiatan</th>
                        <th>Sumber</th>
                        <th>Mitra</th>
                        <th>Tanggal</th>
                        <th>File Proposal</th>
                        <th>File Laporan Akhir</th>
                        <th class="text-center">Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->judul_kegiatan}}</td>
                        <td>{{$d->sumber->sumber_dana}}</td>
                        <td>{{$d->mitra->nama_mitra}}</td>
                        <td>{{$d->tanggal_awal}} / {{$d->tanggal_akhir}}</td>
                        <td>@if($d->file_proposal != null)<a href="{{ asset('files/proposal-files/' . $d->file_proposal) }}" class="btn btn-outline-info">DOWNLOAD</a>@else Belum Upload Proposal @endif</td> 
                        <td>@if($d->file_laporan_akhir != null)<a href="{{ asset('files/laporan-akhir-files/' . $d->file_laporan_akhir) }}" class="btn btn-outline-info">DOWNLOAD</a>@else Belum Upload Laporan @endif</td>
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
                          <a href="Pengabdian-Masyarakat/{{$d->id_pkm}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Pengabdian-Masyarakat.destroy', $d->id_pkm)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertFunc();" type="submit"><i class="far fa-trash-alt text-white" data-feather="delete"></i></button>
                          </form>
                          @if(Auth::user()->authority == "SUPERADMIN" || Auth::user()->authority == "ADMIN" || Auth::user()->authority == "DEKAN" )
                          @if($d->status == "P")
                          <form action="Pengabdian-Masyarakat/{{$d->id_pkm}}/acc" method="post">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-icon btn-info btn-sm" onclick="return AllertAcc();" type="submit">Accept</button>
                          </form>
                          <form action="Pengabdian-Masyarakat/{{$d->id_pkm}}/dec" method="post">
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