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
              <h4>Edit Data Artikel</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Artikel.update', $data->id_artikel) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Judul Artikel</label>
                    <input type="text" name="judul_artikel" id="judul_artikel" class="form-control" value="{{$data->judul_artikel}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('judul_artikel'))
                    <span class="text-danger">{{ $errors->first('judul_artikel') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Jurnal</label>
                  <select name="id_jurnal" id="id_jurnal" class="form-control">
                    @foreach($jurnal as $j)  
                      <option value="{{$j->id_jurnal}}" @if($j->id_jurnal == $data->id_jurnal){{ 'selected' }} @endif>{{$j->nama_jurnal}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Penelitian</label>
                  <select name="id_penelitian" id="id_penelitian" class="form-control">
                    @foreach($penelitian as $p)  
                      <option value="{{$p->id_penelitian}}" @if($p->id_penelitian == $data->id_penelitian){{ 'selected' }} @endif>{{$p->judul_penelitian}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Semester</label>
                  <select name="id_semester" id="id_semester" class="form-control">
                    @foreach($semester as $s)  
                      <option value="{{$s->id_semester}}" @if($s->id_semester == $data->id_semester){{ 'selected' }} @endif>{{$s->nama_semester}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Volume</label>
                    <input type="number" name="volume" id="volume" class="form-control" value="{{$data->volume}}" autofocus>
                    @if ($errors->has('volume'))
                    <span class="text-danger">{{ $errors->first('volume') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan No Jurnal</label>
                    <input type="number" name="no_jurnal" id="no_jurnal" class="form-control" value="{{$data->no_jurnal}}" autofocus>
                    @if ($errors->has('no_jurnal'))
                    <span class="text-danger">{{ $errors->first('no_jurnal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" value="{{$data->tanggal}}" autofocus>
                    @if ($errors->has('tanggal'))
                    <span class="text-danger">{{ $errors->first('tanggal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Link</label>
                    <input type="text" name="link" id="link" class="form-control" value="{{$data->link}}" autofocus>
                    @if ($errors->has('link'))
                    <span class="text-danger">{{ $errors->first('link') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Upload File Artikel</label>
                    <input type="file" name="file_artikel" id="file_artikel" class="form-control" value="{{$data->file_artikel}}" autofocus>
                    @if ($errors->has('file_artikel'))
                    <span class="text-danger">{{ $errors->first('file_artikel') }}</span>
                    @endif
                  </div>
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
