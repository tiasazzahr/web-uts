<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Edit Data Pasien</h1>

        <div class="container">
        
            <div class="row">
                <div class="card">
                  <div class="card-body">
                  <form action='{{ url('/updatedata/'.$data->id) }}' method="POST" enctype="multipart/from-data">
                    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
    <input type="text" name="nama" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $data->nama }}">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Jenis Kelamin</label>
    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
  <option selected>{{ $data->jeniskelamin }}</option>
  <option value="cowo">cowo</option>
  <option value="cewe">cewe</option>
  
</select>
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">No Telpon</label>
    <input type="number" name="notelpon" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $data->notelpon }}">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Alamat</label>
    <input type="text" name="alamat" class="form-control" id="exampleInputEmail1" 
    aria-describedby="emailHelp" value="{{ $data->alamat }}">
    
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
                  </div>
                </div>
        </div>

  
  </body>
</html>