<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title></title>

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
     
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                   
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="panel panel-default">
                      <div class="panel-heading">Data Barang</div>
                      
                          <div class="panel-body">
                            <a  class="btn btn-info" onClick='Tambahdata()' >Tambah</a><br></br>
                              <table class="table datatable" id="customers-table">
                                  <thead>
                                      <tr>
                                          <th>Foto</th>
                                          <th>Nama Barang</th>
                                          <th>Harga Jual</th>
                                          <th>Harga Beli</th>
                                          <th>Stock</th>
                                          <th>Action</th>
                                       
                                      </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($product as $product)
                                    <tr>
                                        <td><img src="{{URL::asset("/image/$product->foto")}}" width='50' height='50' class='img img-responsive'></td>
                                        <td>{{$product->namabarang}}</td>  
                                        <td>Rp.{{number_format($product->hargajual, 0, ',', '.')}}</td>  
                                        <td>Rp.{{number_format($product->hargabeli, 0, ',', '.')}}</td>  
                                        <td>{{$product->stock}} pcs</td>  
                                        <td>
                                        <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                           <a  class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                                         
                                          @csrf
                                           @method('DELETE')
                                          <button  class="btn btn-danger" type="submit">Delete</button>
                                           </form>    </td>  
                                   
                                  </tr>
                                  @endforeach
                                      </tbody>
                              </table>
                          </div>
                    </div>
                </div>
            </div>
        </div>
  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document" style="width:500px">
        <div class="modal-content">
          <div class="modal-header">
            <h3 class="modal-title" id="exampleModalLabel">Tambah Data Barang</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          
          <div class="modal-body">
              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Foto</label>
                <input type="file" class="form-control" id="foto"   name='foto' onchange='validasi()'>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Nama Barang</label>
                <input type="text" class="form-control" name='namabarang' id="namabarang">
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Harga Beli</label>
               <input type="number" class="form-control" id="hargabeli" name='hargabeli' >
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Harga Jual</label>
               <input type="number" class="form-control" id="hargajual" name='hargajual' >
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label">Stock</label>
                 <input type="number" class="form-control" id="stock" name='stock'>
              </div>
       
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
            <button type="submit" class="btn btn-primary" >Simpan</button>
          </div>
        </div>
      </div>
    </div>
     </form>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
  
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css"/>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.3.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
   <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- #region datatables files -->
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<!-- #endregion -->
    <script type="text/javascript">
    $('#customers-table').dataTable();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      function formatMoney(angka) {
             var rupiah = '';
             var angkarev = angka.toString().split('').reverse().join('');
             for (var i = 0; i < angkarev.length; i++)
                 if (i % 3 == 0) rupiah += angkarev.substr(i, 3) + '.';
             return 'Rp. ' + rupiah.split('', rupiah.length - 1).reverse().join('');
         }
      function Tambahdata(){
        $('#modalEdit').modal('show');
      }
      function validasi() {
        var file = document.getElementById('foto')
        var Dokumen = $('#foto').prop('files')[0];
        var pathFile = file.value;
        var ekstensijpg = /(\.jpg)$/i;
        var ekstensipng = /(\.png)$/i;
        if (!ekstensijpg.exec(pathFile) && !ekstensipng.exec(pathFile)) {
            alert('Silakan upload file yang memiliki ekstensi .jpg atau .png');
            file.value = '';
            return;
        } else  if (Dokumen.size > 100000) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'File  Minimal 100KB'
            });
             file.value = '';
            return false;

        }

      }

    </script>

</body>
</html>