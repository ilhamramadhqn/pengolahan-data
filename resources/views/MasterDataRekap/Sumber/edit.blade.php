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
              <h4>Edit Data Sumber</h4>
            </div>
            <div class="card-body p-0">
              <form method="post" action="{{ route('Sumber.update', $data->id_sumber) }}">
                @csrf
                @method('PATCH')
                <div class="card-body">

                  <div class="form-group">
                    <label>Silahkan Masukan Sumber Dana</label>
                    <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" value="{{$data->sumber_dana}}" onkeyup="this.value = this.value.toUpperCase();" autofocus>
                    @if ($errors->has('sumber_dana'))
                    <span class="text-danger">{{ $errors->first('sumber_dana') }}</span>
                    @endif
                  </div>

                </div>
                <div class="card-footer text-right">
                  <a href="/Sumber" class="btn btn-danger">Back</a>
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
