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
              <h4>Tambah Data HKI</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('HKI.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan No HKI</label>
                    <input type="text" name="no_hki" id="no_hki" class="form-control" autofocus>
                    @if ($errors->has('no_hki'))
                    <span class="text-danger">{{ $errors->first('no_hki') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Jenis HKI</label>
                  <select name="id_jenis_hki" id="id_jenis_hki" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Tanggal</label>
                    <input type="date" name="tanggal_permohonan" id="tanggal_permohonan" class="form-control" autofocus>
                    @if ($errors->has('tanggal_permohonan'))
                    <span class="text-danger">{{ $errors->first('tanggal_permohonan') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Semester</label>
                  <select name="id_semester" id="id_semester" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Judul HKI</label>
                    <input type="text" name="judul_hki" id="judul_hki" class="form-control" autofocus>
                    @if ($errors->has('judul_hki'))
                    <span class="text-danger">{{ $errors->first('judul_hki') }}</span>
                    @endif
                  </div>
                </div>
                  file laporan akhir
                <div class="card-footer text-right">
                  <a href="/HKI" class="btn btn-danger">Back</a>
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
