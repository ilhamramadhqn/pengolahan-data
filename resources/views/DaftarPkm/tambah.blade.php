@extends('layouts.app')

@section('content')
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
              <h4>Tambah Data PKM</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Pengabdian-Masyarakat.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Judul Kegiatan</label>
                    <input type="text" name="judul_kegiatan" id="judul_kegiatan" class="form-control" autofocus>
                    @if ($errors->has('judul_kegiatan'))
                    <span class="text-danger">{{ $errors->first('judul_kegiatan') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Sumber</label>
                  <select name="id_sumber" id="id_sumber" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Mitra</label>
                  <select name="id_jenis_penelitian" id="id_jenis_penelitian" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  tanggal awal
                  tanggal akhir
                  file Proposal
                  file laporan akhir
                <div class="card-footer text-right">
                  <a href="/Pengabdian-Masyarakat" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-success">Submit</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
</section>
</div>
@endsection
