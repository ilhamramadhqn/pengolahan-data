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
              <h4>Tambah Data Fakultas</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Fakultas.store') }}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Silahkan Masukan Kode Fakultas</label>
                    <input type="text" name="kode_fakultas" id="kode_fakultas" class="form-control" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('kode_fakultas'))
                    <span class="text-danger">{{ $errors->first('kode_fakultas') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Silahkan Masukan Nama Fakultas</label>
                    <input type="text" name="nama_fakultas" id="nama_fakultas" class="form-control">
                    @if ($errors->has('nama_fakultas'))
                    <span class="text-danger">{{ $errors->first('nama_fakultas') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Fakultas" class="btn btn-danger">Back</a>
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
