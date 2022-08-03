
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
              <h4>Tambah Data Dosen</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Dosen.store') }}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Silahkan Masukan Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" autofocus>
                    @if ($errors->has('kode_dosen'))
                    <span class="text-danger">{{ $errors->first('kode_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan NIDN</label>
                    <input type="text" name="nidn" id="nidn" class="form-control" autofocus>
                    @if ($errors->has('nidn'))
                    <span class="text-danger">{{ $errors->first('nidn') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" autofocus>
                    @if ($errors->has('nama_dosen'))
                    <span class="text-danger">{{ $errors->first('nama_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Jabatan Dosen</label>
                    <input type="text" name="jabfung_dosen" id="jabfung_dosen" class="form-control" autofocus>
                    @if ($errors->has('jabfung_dosen'))
                    <span class="text-danger">{{ $errors->first('jabfung_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Prodi</label>
                  <select name="id_prodi" id="id_prodi" class="form-control">
                    <option value="3">Informatika</option>
                    <option value="4">Elektro</option>
                    <option value="5">Sistem Informasi</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Alamat</label>
                    <textarea name="alamat_dosen" id="alamat_dosen" cols="30" rows="10" class="form-control"></textarea>
                    @if ($errors->has('alamat_dosen'))
                    <span class="text-danger">{{ $errors->first('alamat_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Kota</label>
                  <select name="kota_dosen" id="kota_dosen" class="form-control">
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Provinsi </label>
                  <select name="provinsi_dosen" id="provinsi_dosen" class="form-control">
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Nomor Telepon</label>
                    <input type="text" name="telp_dosen" id="telp_dosen" class="form-control" autofocus>
                    @if ($errors->has('telp_dosen'))
                    <span class="text-danger">{{ $errors->first('telp_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Email</label>
                    <input type="text" name="email" id="email" class="form-control" autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Dosen" class="btn btn-danger">Back</a>
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
