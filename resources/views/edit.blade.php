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
                      <div class="panel-heading">Edit Data Barang</div><br></br>
                 <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')
                        <div class="container">
                             <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-6">
                               <input type="file" class="form-control" id="foto" name="foto" onchange="validasi()" value="{{ $product->foto }}" placeholder="foto">
                                </div>
                            </div>
                        
                        <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Nama Barang</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" id="namabarang" name="namabarang" value="{{ $product->namabarang }}" placeholder="Masukkan Nama Barang">
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga Beli</label>
                                <div class="col-sm-2">
                                <input type="number" class="form-control" id="hargabeli" name="hargabeli" value="{{ $product->hargabeli }}" >
                                </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Harga Jual</label>
                                <div class="col-sm-2">
                                <input type="number" class="form-control" id="hargajual" name="hargajual" value="{{ $product->hargajual }}">
                                </div>
                        </div>
                         <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Stock</label>
                                <div class="col-sm-2">
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" >
                                </div>
                        </div>
                           <div class="form-group row">
                                <label for="inputPassword" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                        </div>
                        </div>
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

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
    <script type="text/javascript">
    // $('#customers-table').dataTable();
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
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
            return false;

        }

      }
      
     
    </script>

</body>
</html>