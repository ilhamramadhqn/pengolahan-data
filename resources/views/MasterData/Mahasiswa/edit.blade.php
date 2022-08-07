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
              <h4>Edit Data Mahasiswa</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Mahasiswa.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan NPM</label>
                    <input type="number" name="npm" id="npm" class="form-control" value="{{$data->npm}}" autofocus>
                    @if ($errors->has('npm'))
                    <span class="text-danger">{{ $errors->first('npm') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" value="{{$data->nama_mhs}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('nama_mhs'))
                    <span class="text-danger">{{ $errors->first('nama_mhs') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Prodi</label>
                    <select name="id_prodi" id="id_prodi" class="form-control">
                    @foreach($prodi as $p)
                      <option value="{{$p->id_prodi}}" @if($p->id_prodi == $data->id_prodi){{ 'selected' }} @endif>{{$p->kode_prodi}} - {{$p->nama_prodi}}</option>
                    @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Kelas</label>
                  <select name="kelas" id="kelas" class="form-control">
                    <option value="REGULER" @if($data->kelas == "REGULER"){{ 'selected' }} @endif>REGULER</option>
                    <option value="KARYAWAN" @if($data->kelas == "KARYAWAN"){{ 'selected' }} @endif>KARYAWAN</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Angkatan</label>
                  <select name="angkatan" id="angkatan" class="form-control">
                    <option value="">-</option>
                    <?php
                    $now = date('Y');
                    for ($i = $now; $i >= 2000; $i--) {
                      echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                  </select>
                  </div>
                </div>
                <div class="card-footer text-right">
                  <a href="/Mahasiswa" class="btn btn-danger">Back</a>
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
