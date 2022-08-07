
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
              <h4>Edit Data Dosen</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Dosen.update', $data->id_dosen) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Kode Dosen</label>
                    <input type="text" name="kode_dosen" id="kode_dosen" class="form-control" onkeyup="this.value = this.value.toUpperCase();" value="{{$data->kode_dosen}}" autofocus>
                    @if ($errors->has('kode_dosen'))
                    <span class="text-danger">{{ $errors->first('kode_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan NIDN</label>
                    <input type="number" name="nidn" id="nidn" class="form-control" value="{{$data->nidn}}" autofocus>
                    @if ($errors->has('nidn'))
                    <span class="text-danger">{{ $errors->first('nidn') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Nama Dosen</label>
                    <input type="text" name="nama_dosen" id="nama_dosen" class="form-control" onkeyup="this.value = this.value.toUpperCase();" value="{{$data->nama_dosen}}" autofocus>
                    @if ($errors->has('nama_dosen'))
                    <span class="text-danger">{{ $errors->first('nama_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Jabatan Dosen</label>
                    <input type="text" name="jabfung_dosen" id="jabfung_dosen" class="form-control" onkeyup="this.value = this.value.toUpperCase();" value="{{$data->jabfung_dosen}}" autofocus>
                    @if ($errors->has('jabfung_dosen'))
                    <span class="text-danger">{{ $errors->first('jabfung_dosen') }}</span>
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
                    <label>Silahkan Masukan Alamat</label>
                    <textarea name="alamat_dosen" id="alamat_dosen" cols="30" rows="10" class="form-control">{{$data->alamat_dosen}}</textarea>
                    @if ($errors->has('alamat_dosen'))
                    <span class="text-danger">{{ $errors->first('alamat_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Kota</label>
                  <select name="kota_dosen" id="kota_dosen" class="form-control">
                    <option value="KOTA BANDUNG" @if($data->kota_dosen == "KOTA BANDUNG"){{ 'selected' }} @endif>KOTA BANDUNG</option>
                    <option value="KOTA JAKARTA" @if($data->kota_dosen == "KOTA JAKARTA"){{ 'selected' }} @endif>KOTA JAKARTA</option>
                    <option value="KOTA YOGYAKARTA" @if($data->kota_dosen == "KOTA YOGYAKARTA"){{ 'selected' }} @endif>KOTA YOGYAKARTA</option>
                    <option value="KOTA MEDAN" @if($data->kota_dosen == "KOTA MEDAN"){{ 'selected' }} @endif>KOTA MEDAN</option>
                    <option value="KOTA MALANG" @if($data->kota_dosen == "KOTA MALANG"){{ 'selected' }} @endif>KOTA MALANG</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Provinsi </label>
                  <select name="provinsi_dosen" id="provinsi_dosen" class="form-control">
                    <option value="JAWA BARAT" @if($data->provinsi_dosen == "JAWA BARAT"){{ 'selected' }} @endif>JAWA BARAT</option>
                    <option value="JAWA TIMUR" @if($data->provinsi_dosen == "JAWA TIMUR"){{ 'selected' }} @endif>JAWA TIMUR</option>
                    <option value="JAWA TENGAH" @if($data->provinsi_dosen == "JAWA TENGAH"){{ 'selected' }} @endif>JAWA TENGAH</option>
                    <option value="KALIMANTAN BARAT" @if($data->provinsi_dosen == "KALIMANTAN BARAT"){{ 'selected' }} @endif>KALIMANTAN BARAT</option>
                    <option value="KALIMANTAN TIMUR" @if($data->provinsi_dosen == "KALIMANTAN TIMUR"){{ 'selected' }} @endif>KALIMANTAN TIMUR</option>
                    <option value="KALIMANTAN TENGAH" @if($data->provinsi_dosen == "KALIMANTAN TENGAH"){{ 'selected' }} @endif>KALIMANTAN TENGAH</option>
                    <option value="SULAWESI BARAT" @if($data->provinsi_dosen == "SULAWESI BARAT"){{ 'selected' }} @endif>SULAWESI BARAT</option>
                    <option value="SULAWESI TIMUR" @if($data->provinsi_dosen == "SULAWESI TIMUR"){{ 'selected' }} @endif>SULAWESI TIMUR</option>
                    <option value="SULAWESI TENGAH" @if($data->provinsi_dosen == "SULAWESI TENGAH"){{ 'selected' }} @endif>SULAWESI TENGAH</option>
                  </select>
                  <div class="form-group">
                    <label>Silahkan Masukan Nomor Telepon</label>
                    <input type="number" name="telp_dosen" id="telp_dosen" class="form-control" value="{{$data->telp_dosen}}" autofocus>
                    @if ($errors->has('telp_dosen'))
                    <span class="text-danger">{{ $errors->first('telp_dosen') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Silahkan Masukan Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{$data->email}}" autofocus>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Dosen" class="btn btn-danger">Back</a>
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
