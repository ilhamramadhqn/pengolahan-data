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
              <h4>Edit Data Jenis Publikasi</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Jenis-Publikasi.update', $data->id_jenis_penelitian) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Jenis Publikasi</label>
                    <input type="text" name="nama_jenis_penelitian" id="nama_jenis_penelitian" class="form-control" value="{{$data->nama_jenis_penelitian}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('nama_jenis_penelitian'))
                    <span class="text-danger">{{ $errors->first('nama_jenis_penelitian') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Jenis-Publikasi" class="btn btn-danger">Back</a>
                  <button type="submit" class="btn btn-success">Update</button>
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
