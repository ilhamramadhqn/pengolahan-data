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
              <h4>Data Dosen</h4>
              <div class="card-header-action">
                <a href="{{ route('Dosen.create') }}" class="btn btn-primary">Tambah Data <i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="col-md-12">
              <div class="card-body p-0">
                <div class="table-responsive table-invoice">
                  <table id="myTable" class="table table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Dosen</th>
                        <th>NIDN</th>
                        <th>Nama Dosen</th>
                        <th>Jabatan</th>
                        <!-- <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>No Telp</th>
                        <th>Email</th>-->
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $d)
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->kode_dosen}}</td>
                        <td>{{$d->nidn}}</td>
                        <td>{{$d->nama_dosen}}</td>
                        <td>{{$d->jabfung_dosen}}</td>
                        <!--<td>{{$d->alamat_dosen}}</td>
                        <td>{{$d->kota_dosen}}</td>
                        <td>{{$d->provinsi_dosen}}</td> 
                        <td>{{$d->telp_dosen}}</td>
                        <td>{{$d->email}}</tbody> -->
                        <td>
                          <a href="Dosen/{{$d->id_dosen}}/edit" class="edit btn btn-icon btn-primary btn-sm "><i class="fas fa-edit"></i></a>
                          <form action="{{ route('Dosen.destroy', $d->id_dosen)}}" method="post">
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
</script>
</section>
</div>
@endsection