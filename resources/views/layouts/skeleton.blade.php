<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  <title>@yield('title', 'UNIBI') &mdash; {{ config('app.name') }}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
  @stack('stylesheet')

</head>

<body>
  <div id="app">
    @yield('app')
  </div>
  <script src="{{ mix('js/manifest.js') }}"></script>
  <script src="{{ mix('js/vendor.js') }}"></script>
  <script src="{{ mix('js/app.js') }}"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
  <script>

   $(document). ready( function() {
    isi()
    btndelete()
    btnedit()
    savebtn()
  })
  //Fakultas
   function isi(){
    $('#FakultasTable').DataTable( {
      processing: true,
      serverSide: true,
      ajax: {
        url: "{{ route('Fakultas.index') }}"
      },
      columns:[
      {
        "data" : null, "sortable": false,
        render : function (data, type, row, meta){
          return meta.row + meta.settings._iDisplayStart + 1
        }
      },
      {data: 'kode_fakultas', name: 'kode_fakultas'},
      {data: 'nama_fakultas', name: 'nama_fakultas'},
      {data: 'action', name: 'action', orderable: true, searchable: true},
      ]
    })
  }
  // //Prodi
  // function isi(){
  //   $('#ProdiTable').DataTable( {
  //     processing: true,
  //     serverSide: true,
  //     ajax: {
  //       url: "{{ route('Program-Studi.index') }}"
  //     },
  //     columns:[
  //     {
  //       "data" : null, "sortable": false,
  //       render : function (data, type, row, meta){
  //         return meta.row + meta.settings._iDisplayStart + 1
  //       }
  //     },
  //     {data: 'kode_prodi', name: 'kode_fakultas'},
  //     {data: 'nama_prodi', name: 'nama_fakultas'},
  //     {data: 'id_fakultas', name: 'id_fakultas'},
  //     {data: 'action', name: 'action', orderable: true, searchable: true},
  //     ]
  //   })
  // }


  function btnedit(){
    $('body').on('click', '.editFk', function () {
      var fakultass = $(this).data('id');
      $.get("{{ route('Fakultas.index') }}" +'/' + fakultass +'/edit', function (data) {
        $('#modelHeading').html("Edit Data Fakultas");
        $('#saveBtn').val("edit-user");
        $('#ajaxModel').modal('show');
        $('#kode_fakultas').val(data.kode_fakultas
        );
        $('#nama_fakultas').val(data.nama_fakultas);
      })
    });
  }

  function savebtn(){
    $('#saveBtn').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');
        
            $.ajax({
                data: $('#productForm').serialize(),
                url: "{{ route('Fakultas.store') }}",
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    $('#productForm').trigger("reset");
                    $('#ajaxModel').modal('hide');
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                    $('#saveBtn').html('Save Changes');
                }
            });
        });
  }

  function btndelete(){
    $('body').on('click', '.deleteFk', function (){
      var fakultass = $(this).data("id");
      var result = confirm("Are You sure want to delete !");
      if(result){
        $.ajax({
          type: "DELETE",
          url: "{{ route('Fakultas.store') }}"+'/'+fakultass,
          success: function (data) {
            table.draw();
          },
          error: function (data) {
            console.log('Error:', data);
          }
        });
      }else{
        return false;
      }
    })
  }
</script>
@stack('javascript')
</body>
</html>
