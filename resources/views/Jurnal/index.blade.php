@extends('layouts.app')

@section('content')
@include('sweetalert::alert')

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
              <h4>Daftar Jurnal</h4>
              <div class="card-header-action">
                <a href="{{ route('Jurnal.create') }}" class="btn btn-primary">Tambah Data<i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Jenis Jurnal</th>
                        <th>Penerbit</th>
                        <th>PSSN</th>
                        <th>EISSN</th>
                        <th>Link</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->nama_jurnal}}</td>
                        <td>{{$d->jenisjurnal->nama_jenis}}</td>
                        <td>{{$d->penerbit_jurnal}}</td>
                        <td>{{$d->pssn_jurnal}}</td>
                        <td>{{$d->eissn_jurnal}}</td>
                        <td><a href="{{$d->link_website}}">{{$d->link_website}}</a></td>
                        <td>
                          <a href="Jurnal/{{$d->id_jurnal}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Jurnal.destroy', $d->id_jurnal)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-icon btn-danger btn-sm" onclick="return AllertFunc();" type="submit"><i class="far fa-trash-alt text-white" data-feather="delete"></i></button>
                          </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div>
  <script>
  function AllertFunc() {
      if(!confirm("Are You Sure to delete this"))
      event.preventDefault();
  }
  function AllertAcc() {
      if(!confirm("Are You Sure to accept this"))
      event.preventDefault();
  }
  function AllertDec() {
      if(!confirm("Are You Sure to decline this"))
      event.preventDefault();
  }
</script>
</section>
</div>
@endsection