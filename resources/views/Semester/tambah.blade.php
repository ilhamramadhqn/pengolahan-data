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
                    <input type="text" name="judul_penelitian" id="judul_penelitian" class="form-control" autofocus>
                    @if ($errors->has('judul_penelitian'))
                    <span class="text-danger">{{ $errors->first('judul_penelitian') }}</span>
                    @endif
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Sumber</label>
                  <select name="id_sumber" id="id_sumber" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Jenis Penelitian</label>
                  <select name="id_jenis_penelitian" id="id_jenis_penelitian" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Semester</label>
                  <select name="id_semester" id="id_semester" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                  </select>
                  </div>
                  <div class="form-group">
                  <label>Silahkan Masukan Tahun</label>
                  <select name="tahun" id="tahun" class="form-control">
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
                file Proposal
                  file laporan akhir
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
