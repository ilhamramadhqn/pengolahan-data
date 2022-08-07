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
              <h4>Edit Jenis HKI</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Jenis-HKI.update', $data->id_jenis_hki) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Jenis HKI</label>
                    <input type="text" name="nama_jenis_hki" id="nama_jenis_hki" class="form-control" class="form-control" value="{{$data->nama_jenis_hki}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('nama_jenis_hki'))
                    <span class="text-danger">{{ $errors->first('nama_jenis_hki') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Jenis-HKI" class="btn btn-danger">Back</a>
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
