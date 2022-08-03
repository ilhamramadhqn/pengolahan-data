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
              <h4>Tambah Data Mitra</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Mitra.store') }}">
                @csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Silahkan Masukan Nama Mitra</label>
                    <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" autofocus>
                    @if ($errors->has('nama_mitra'))
                    <span class="text-danger">{{ $errors->first('nama_mitra') }}</span>
                    @endif
                  </div>

                  <div class="form-group">
                    <label>Silahkan Masukan Alamat</label>
                    <textarea name="alamat_mitra" id="alamat_mitra" cols="30" rows="10" class="form-control"></textarea>
                    @if ($errors->has('alamat_mitra'))
                    <span class="text-danger">{{ $errors->first('alamat_mitra') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Kota</label>
                  <select name="kota_mitra" id="kota_mitra" class="form-control">
                    <option value="Jakarta">Jakarta</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Yogyakarta">Yogyakarta</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Provinsi </label>
                  <select name="provinsi_mitra" id="provinsi_mitra" class="form-control">
                    <option value="Jawa Barat">Jawa Barat</option>
                    <option value="Jawa Timur">Jawa Timur</option>
                    <option value="Jawa Tengah">Jawa Tengah</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan PIC</label>
                    <input type="text" name="pic_mitra" id="pic_mitra" class="form-control" autofocus>
                    @if ($errors->has('pic_mitra'))
                    <span class="text-danger">{{ $errors->first('pic_mitra') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Telepon</label>
                    <input type="text" name="telepon_mitra" id="telepon_mitra" class="form-control" autofocus>
                    @if ($errors->has('telepon_mitra'))
                    <span class="text-danger">{{ $errors->first('telepon_mitra') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Email</label>
                    <input type="text" name="email_mitra" id="email_mitra" class="form-control" autofocus>
                    @if ($errors->has('email_mitra'))
                    <span class="text-danger">{{ $errors->first('email_mitra') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Mitra" class="btn btn-danger">Back</a>
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
