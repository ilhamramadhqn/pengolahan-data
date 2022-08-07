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
                    <input type="text" name="nama_mitra" id="nama_mitra" class="form-control" onkeyup="this.value = this.value.toUpperCase();" autofocus>
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
                    <option value="KOTA BANDUNG">KOTA BANDUNG</option>
                    <option value="KOTA JAKARTA">KOTA JAKARTA</option>
                    <option value="KOTA YOGYAKARTA">KOTA YOGYAKARTA</option>
                    <option value="KOTA MEDAN">KOTA MEDAN</option>
                    <option value="KOTA MALANG">KOTA MALANG</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Provinsi </label>
                  <select name="provinsi_mitra" id="provinsi_mitra" class="form-control">
                    <option value="JAWA BARAT">JAWA BARAT</option>
                    <option value="JAWA TIMUR">JAWA TIMUR</option>
                    <option value="JAWA TENGAH">JAWA TENGAH</option>
                    <option value="KALIMANTAN BARAT">KALIMANTAN BARAT</option>
                    <option value="KALIMANTAN TIMUR">KALIMANTAN TIMUR</option>
                    <option value="KALIMANTAN TENGAH">KALIMANTAN TENGAH</option>
                    <option value="SULAWESI BARAT">SULAWESI BARAT</option>
                    <option value="SULAWESI TIMUR">SULAWESI TIMUR</option>
                    <option value="SULAWESI TENGAH">SULAWESI TENGAH</option>
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
                    <input type="number" name="telepon_mitra" id="telepon_mitra" class="form-control" autofocus>
                    @if ($errors->has('telepon_mitra'))
                    <span class="text-danger">{{ $errors->first('telepon_mitra') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Email</label>
                    <input type="email" name="email_mitra" id="email_mitra" class="form-control" autofocus>
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
