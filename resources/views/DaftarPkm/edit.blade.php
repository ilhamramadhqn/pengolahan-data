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
              <h4>Edit Data PKM</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Pengabdian-Masyarakat.update', $data->id_pkm) }}" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Judul Kegiatan</label>
                    <input type="text" name="judul_kegiatan" id="judul_kegiatan" class="form-control" value="{{$data->judul_kegiatan}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('judul_kegiatan'))
                    <span class="text-danger">{{ $errors->first('judul_kegiatan') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Sumber</label>
                  <select name="id_sumber" id="id_sumber" class="form-control">
                    @foreach($sumber as $sum)  
                      <option value="{{$sum->id_sumber}}" @if($sum->id_sumber == $data->id_sumber){{ 'selected' }} @endif>{{$sum->sumber_dana}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Mitra</label>
                  <select name="id_mitra" id="id_mitra" class="form-control">
                    @foreach($mitra as $m)  
                      <option value="{{$m->id_mitra}}" @if($m->id_mitra == $data->id_mitra){{ 'selected' }} @endif>{{$m->nama_mitra}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <div>
                    <label>Tanggal</label>
                    </div>
                    <div class="col-xs-3">
                    <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control" value="{{$data->tanggal_awal}}" autofocus>
                    @if ($errors->has('tanggal_awal'))
                    <span class="text-danger">{{ $errors->first('tanggal_awal') }}</span>
                    @endif
                    </div>
                    <div class="col-xs-3">
                    <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control col-xs-2" value="{{$data->tanggal_akhir}}" autofocus>
                    @if ($errors->has('tanggal_akhir'))
                    <span class="text-danger">{{ $errors->first('tanggal_akhir') }}</span>
                    @endif
                    </div>
                  </div>
                  <br>
                  <div class="form-group">
                    <label>Upload File Proposal</label>
                    <input type="file" name="file_proposal" id="file_proposal" class="form-control" value="{{$data->file_proposal}}" autofocus>
                    @if ($errors->has('file_proposal'))
                    <span class="text-danger">{{ $errors->first('file_proposal') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                    <label>Upload File Laporan Akhir</label>
                    <input type="file" name="file_laporan_akhir" id="file_laporan_akhir" class="form-control" value="{{$data->file_laporan_akhir}}" autofocus>
                    @if ($errors->has('file_laporan_akhir'))
                    <span class="text-danger">{{ $errors->first('file_laporan_akhir') }}</span>
                    @endif
                  </div>
                <div class="card-footer text-right">
                  <a href="/Pengabdian-Masyarakat" class="btn btn-danger">Back</a>
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
