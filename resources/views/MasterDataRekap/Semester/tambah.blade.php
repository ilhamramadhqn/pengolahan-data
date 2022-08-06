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
                  <select name="tahun" class="form-control" required>
                    <option value="">-</option>
                    <?php
                    $now = date('Y');
                    for ($i = $now; $i >= 2000; $i--) {
                      echo "<option value='".$i."/".($i+1)."'>".$i."/".($i+1)."</option>";
                    }
                    ?>
                  </select>
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
