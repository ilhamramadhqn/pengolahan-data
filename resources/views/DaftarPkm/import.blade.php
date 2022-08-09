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
              <h4>Import Data PKM</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('PkmImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Import File</label>
                    <input type="file" name="import_file" id="import_file" class="form-control" autofocus>
                    @if ($errors->has('import_file'))
                    <span class="text-danger">{{ $errors->first('import_file') }}</span>
                    @endif
                  </div>
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
