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
              <h4>Edit Data HKI</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('HKI.update', $data->id_hki) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Judul HKI</label>
                    <input type="text" name="judul_hki" id="judul_hki" class="form-control" value="{{$data->judul_hki}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('judul_hki'))
                    <span class="text-danger">{{ $errors->first('judul_hki') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan No HKI</label>
                    <input type="text" name="no_hki" id="no_hki" class="form-control" value="{{$data->no_hki}}" onkeyup="this.value = this.value.toUpperCase();"autofocus>
                    @if ($errors->has('no_hki'))
                    <span class="text-danger">{{ $errors->first('no_hki') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Jenis HKI</label>
                  <select name="id_jenis_hki" id="id_jenis_hki" class="form-control">
                    @foreach($jenishki as $jh)  
                      <option value="{{$jh->id_jenis_hki}}" @if($jh->id_jenis_hki == $data->id_jenis_hki){{ 'selected' }} @endif>{{$jh->nama_jenis_hki}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Tanggal</label>
                    <input type="date" name="tanggal_permohonan" id="tanggal_permohonan" class="form-control" value="{{$data->tanggal_permohonan}}" autofocus>
                    @if ($errors->has('tanggal_permohonan'))
                    <span class="text-danger">{{ $errors->first('tanggal_permohonan') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Upload File HKI</label>
                    <input type="file" name="file_hki" id="file_hki" class="form-control" value="{{$data->file_hki}}" autofocus>
                    @if ($errors->has('file_hki'))
                    <span class="text-danger">{{ $errors->first('file_hki') }}</span>
                    @endif
                  </div>
                </div>
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
