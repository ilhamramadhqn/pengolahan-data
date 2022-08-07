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
              <h4>Daftar Penelitian</h4>
              <div class="card-header-action">
                <a href="{{ route('Penelitian.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul Penelitian</th>
                        <th>Sumber</th>
                        <th>Jenis Penelitian</th>
                        <th>Semester</th>
                        <th>Tahun</th>
                        <th>File Proposal</th>
                        <th>File Laporan Akhir</th>
                        <th>Status</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->judul_penelitian}}</td>
                        <td>{{$d->sumber->sumber_dana}}</td>
                        <td>{{$d->jenispenelitian->nama_jenis_penelitian}}</td>
                        <td>{{$d->semester->nama_semester}}</td>
                        <td>{{$d->tahun}}</td>
                        <td>@if($d->file_proposal != null)<a href="{{ asset('files/proposal-files/' . $d->file_proposal) }}" class="btn btn-outline-info">DOWNLOAD</a>@else - @endif</td> 
                        <td>@if($d->file_proposal != null)<a href="{{ asset('files/laporan-akhir-files/' . $d->file_laporan_akhir) }}" class="btn btn-outline-info">DOWNLOAD</a>@else - @endif</td>
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
                          <a href="Penelitian/{{$d->id_penelitian}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Penelitian.destroy', $d->id_penelitian)}}" method="post">
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