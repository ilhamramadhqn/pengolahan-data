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
              <h4>Tambah Data Program Studi</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Program-Studi.store') }}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Silahkan Masukan Kode Program Studi</label>
                    <input type="text" name="kode_prodi" id="kode_prodi" class="form-control" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('kode_prodi'))
                    <span class="text-danger">{{ $errors->first('kode_prodi') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Silahkan Masukan Nama Program Studi</label>
                    <input type="text" name="nama_prodi" id="nama_prodi" class="form-control">
                    @if ($errors->has('nama_prodi'))
                    <span class="text-danger">{{ $errors->first('nama_prodi') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Fakultas</label>
                  <select name="id_fakultas" id="id_fakultas" class="form-control">
                  @foreach($fakultas as $f)  
                    <option value="{{$f->id_fakultas}}">{{$f->kode_fakultas}} - {{$f->nama_fakultas}}</option>
                  @endforeach
                  </select>

                </div>
                <div class="card-footer text-right">
                  <a href="/Program-Studi" class="btn btn-danger">Back</a>
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
