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
              <h4>Tambah Data Penelitian</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Penelitian.store') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Silahkan Masukan Judul Penelitian</label>
                    <input type="text" name="judul_penelitian" id="judul_penelitian" class="form-control" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('judul_penelitian'))
                    <span class="text-danger">{{ $errors->first('judul_penelitian') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Sumber</label>
                  <select name="id_sumber" id="id_sumber" class="form-control">
                    @foreach($sumber as $sum)  
                      <option value="{{$sum->id_sumber}}">{{$sum->sumber_dana}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Jenis Penelitian</label>
                  <select name="id_jenis_penelitian" id="id_jenis_penelitian" class="form-control">
                    @foreach($jenispublikasi as $jp)  
                      <option value="{{$jp->id_jenis_penelitian}}">{{$jp->nama_jenis_penelitian}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Semester</label>
                  <select name="id_semester" id="id_semester" class="form-control">
                    @foreach($semester as $s)  
                      <option value="{{$s->id_semester}}">{{$s->nama_semester}}</option>
                    @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Tahun</label>
                  <select name="tahun" id="tahun" class="form-control">
                    <option value="">-</option>
                    <?php
                    $now = date('Y');
                    for ($i = $now; $i >= 2000; $i--) {
                      echo "<option value='".$i."'>".$i."</option>";
                    }
                    ?>
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Upload File Proposal</label>
                    <input type="file" name="file_proposal" id="file_proposal" class="form-control" autofocus>
                    @if ($errors->has('file_proposal'))
                    <span class="text-danger">{{ $errors->first('file_proposal') }}</span>
                    @endif
                  </div>
                  <!-- <div class="form-group">
                    <label>Upload File Jurnal</label>
                    <input type="file" name="file_laporan_akhir" id="file_laporan_akhir" class="form-control" autofocus>
                    @if ($errors->has('file_laporan_akhir'))
                    <span class="text-danger">{{ $errors->first('file_laporan_akhir') }}</span>
                    @endif
                  </div> -->
                </div>
                <div class="card-footer text-right">
                  <a href="/Penelitian" class="btn btn-danger">Back</a>
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
