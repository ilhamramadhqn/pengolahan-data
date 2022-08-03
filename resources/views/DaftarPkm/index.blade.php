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
                <a href="{{ route('Pengabdian-Masyarakat.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Sumber</th>
                        <th>Mitra</th>
                        <th>Judul Kegiatan</th>
                        <th>Tanggal</th>
                        <th>File Proposal</th>
                        <th>File Laporan Akhir</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->sumber->sumber_dana}}</td>
                        <td>{{$d->mitra->nama_mitra}}</td>
                        <td>{{$d->judul_kegiatan}}</td>
                        <td>{{$d->tanggal_awal}} - {{$d->tanggal_akhir}}</td>
                        <td>{{$d->file_proposal}}</td> 
                        <td>{{$d->file_laporan_akhir}}</td>
                        <td>
                          <a href="" class="edit btn btn-icon btn-primary btn-sm editFk"><i class="fas fa-edit"></i></a>
                          <a href="" class="btn btn-icon btn-danger btn-sm deleteFk"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>
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
  <!-- <tr>
                        @foreach($data as $d)
                        <th>{{$d->id_fakultas}}</th>
                        <th>{{$d->kode_fakultas}}</th>
                        <th>{{$d->nama_fakultas}}</th>
                        <th>
                          <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$fakultass->id_fakultas.'" data-original-title="Edit" class="edit btn btn-icon btn-primary btn-sm editFk"><i class="fas fa-edit"></i></a>
                          <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$fakultass->id_fakultas.'" data-original-title="Delete" class="btn btn-icon btn-danger btn-sm deleteFk"><i class="far fa-trash-alt text-white" data-feather="delete"></i></a>
                        </th>
                        @endforeach
                      </tr> -->

  <!-- Start Modal Edit -->
  <div class="modal" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="modelHeading"></h4>
        </div>
        <div class="modal-body">
          <div class="card-body">

            <form id="productForm" name="productForm" class="form-horizontal">

              <input type="hidden" name="fakultass" id="fakultass">
              <div class="form-group">
                <label class="col-sm-6 control-label">Kode Fakultas</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="kode_fakultas" name="kode_fakultas" maxlength="50" required="">
                </div>
              </div>
              <div class="form-group mt-3">
                <label class="col-sm-6 control-label">Nama Fakultas</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas" maxlength="50" required="">
                </div>
              </div>

              <div class="card-footer text-right">
                <div class="mt-3">
                  <button type="submit" class="btn btn-success btn-sm" id="saveBtn" value="create">Save changes</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Edit -->
</section>
</div>
@endsection