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
              <h4>Tambah Semester</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Semester.store') }}">
                @csrf
                <div class="card-body">
      
                  <div class="form-group">
                  <label>Silahkan Masukan Tipe Semester</label>
                  <select name="tipe_sem" id="tipe_sem" class="form-control">
                    <option value="GANJIL">GANJIL</option>
                    <option value="GENAP">GENAP</option>
                  </select>
                  </div>
                  <label>Silahkan Masukan Tahun Ajaran</label>
                  <div class="form-group">
                    <input type="text" name="tahun_awal" id="tahun_awal" class="form-control col-lg-2" autofocus>
                    @if ($errors->has('tahun_awal'))
                    <span class="text-danger">{{ $errors->first('tahun_awal') }}</span>
                    @endif
                    <input type="text" class="form-control col-lg-1" placeholder="-" disabled>
                    <input type="text" name="tahun_akhir" id="tahun_akhir" class="form-control col-lg-2">
                    @if ($errors->has('tahun_akhir'))
                    <span class="text-danger">{{ $errors->first('tahun_akhir') }}</span>
                    @endif
                  </div>
                  

                </div>
                <div class="card-footer text-right">
                  <a href="/Semester" class="btn btn-danger">Back</a>
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
