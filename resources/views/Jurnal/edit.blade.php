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
              <h4>Tambah Data Jurnal</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Jurnal.update', $data->id_jurnal) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Judul Jurnal</label>
                    <input type="text" name="nama_jurnal" id="nama_jurnal" class="form-control" value="{{$data->nama_jurnal}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('nama_jurnal'))
                    <span class="text-danger">{{ $errors->first('nama_jurnal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Jenis Jurnal</label>
                  <select name="id_jenis" id="id_jenis" class="form-control">
                    @foreach($jenisjurnal as $jj)  
                      <option value="{{$jj->id_jenis}}" @if($jj->id_jenis == $data->id_jenis){{ 'selected' }} @endif>{{$jj->nama_jenis}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Penerbit Jurnal</label>
                    <input type="text" name="penerbit_jurnal" id="penerbit_jurnal" class="form-control" value="{{$data->penerbit_jurnal}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('penerbit_jurnal'))
                    <span class="text-danger">{{ $errors->first('penerbit_jurnal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan PSSN</label>
                    <input type="text" name="pssn_jurnal" id="pssn_jurnal" class="form-control" value="{{$data->pssn_jurnal}}" autofocus>
                    @if ($errors->has('pssn_jurnal'))
                    <span class="text-danger">{{ $errors->first('pssn_jurnal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan EISSN</label>
                    <input type="text" name="eissn_jurnal" id="eissn_jurnal" class="form-control" value="{{$data->eissn_jurnal}}" autofocus>
                    @if ($errors->has('eissn_jurnal'))
                    <span class="text-danger">{{ $errors->first('eissn_jurnal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Link Website</label>
                    <input type="text" name="link_website" id="link_website" class="form-control" value="{{$data->link_website}}" autofocus>
                    @if ($errors->has('link_website'))
                    <span class="text-danger">{{ $errors->first('link_website') }}</span>
                    @endif
                  </div>
                <div class="card-footer text-right">
                  <a href="/Jurnal" class="btn btn-danger">Back</a>
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
