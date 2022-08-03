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
              <h4>Tambah Data Artikel</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Artikel.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                  <label>Silahkan Masukan Jurnal</label>
                  <select name="id_jurnal" id="id_jurnal" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Penelitian</label>
                  <select name="id_penelitian" id="id_penelitian" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
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
                    <label>Silahkan Masukan Volume</label>
                    <input type="number" name="volume" id="volume" class="form-control" autofocus>
                    @if ($errors->has('volume'))
                    <span class="text-danger">{{ $errors->first('volume') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan No Jurnal</label>
                    <input type="text" name="no_jurnal" id="no_jurnal" class="form-control" autofocus>
                    @if ($errors->has('no_jurnal'))
                    <span class="text-danger">{{ $errors->first('no_jurnal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" autofocus>
                    @if ($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Judul Artikel</label>
                    <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" autofocus>
                    @if ($errors->has('judul_artikel'))
                    <span class="text-danger">{{ $errors->first('judul_artikel') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Link</label>
                    <input type="text" name="link" id="link" class="form-control" autofocus>
                    @if ($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                    @endif
                  </div>
                  file artikel
                <div class="card-footer text-right">
                  <a href="/Artikel" class="btn btn-danger">Back</a>
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
