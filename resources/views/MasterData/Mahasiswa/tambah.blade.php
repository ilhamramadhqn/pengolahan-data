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
              <h4>Tambah Data Mahasiswa</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Mahasiswa.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan NPM</label>
                    <input type="text" name="npm" id="npm" class="form-control" autofocus>
                    @if ($errors->has('npm'))
                    <span class="text-danger">{{ $errors->first('npm') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Mahasiswa</label>
                    <input type="text" name="nama_mhs" id="nama_mhs" class="form-control" autofocus>
                    @if ($errors->has('nama_mhs'))
                    <span class="text-danger">{{ $errors->first('nama_mhs') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Prodi</label>
                  <select name="id_prodi" id="id_prodi" class="form-control">
                    <option value="3">Informatika</option>
                    <option value="4">Elektro</option>
                    <option value="5">Sistem Informasi</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Kelas</label>
                  <select name="kelas" id="kelas" class="form-control">
                    <option value="Reguler">Reguler</option>
                    <option value="Karyawan">Karyawan</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Angkatan</label>
                  <select name="angkatan" id="angkatan" class="form-control">
                    <option value="2015">2015</option>
                    <option value="2016">2016</option>
                    <option value="2017">2017</option>
                    <option value="2018">2018</option>
                    <option value="2019">2019</option>
                    <option value="2020">2020</option>
                    <option value="2021">2021</option>
                    <option value="2022">2022</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2027</option>
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
