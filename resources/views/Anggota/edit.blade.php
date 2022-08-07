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
              <h4>Edit Data Anggota</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Anggota.update', $data->id_anggota) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Dosen</label>
                    <select name="id_dosen" id="id_dosen" class="form-control">
                    @foreach($dosen as $d)  
                      <option value="{{$d->id_dosen}}" @if($d->id_dosen == $data->id_dosen){{ 'selected' }} @endif>{{$d->nidn}} - {{$d->nama_dosen}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Mahasiswa</label>
                    <select name="id_mhs" id="id_mhs" class="form-control">
                    @foreach($mahasiswa as $m)  
                      <option value="{{$m->id_mhs}}" @if($m->id_mhs == $data->id_mhs){{ 'selected' }} @endif>{{$m->npm}} - {{$m->nama_mhs}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Penelitian</label>
                    <select name="id_penelitian" id="id_artikel" class="form-control">
                    @foreach($penelitian as $p)  
                      <option value="{{$p->id_penelitian}}" @if($p->id_penelitian == $data->id_penelitian){{ 'selected' }} @endif>{{$p->judul_penelitian}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan No</label>
                    <input type="number" name="no" id="no" class="form-control" value="{{$data->no}}"onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('no'))
                    <span class="text-danger">{{ $errors->first('no') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Anggota" class="btn btn-danger">Back</a>
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