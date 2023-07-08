<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center mb-4">Data Pasien</h1>

        <div class="container">
        <a href="/tambahpasien"  class="btn btn-success">Tambah +</button>
            <div class="row">
              @if($message = Session::get('succes'))
              <div class="alert alert-success" role="alert">
                {{$message }}
              </div> 

              @endif  
        </div>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No Telpon</th>
      <th scope="col">alamat</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($data as $row)
    <tr>
      <th scope="row">{{ $row->id }}</th>
      <td>{{ $row->nama }}</td>
      <td>{{ $row->jeniskelamin }}</td>
      <td>0{{ $row->notelpon }}</td>
      <td>{{ $row->alamat }}</td>
      <td>
        
        <a href="/tampilkandata/{{ $row->id }}"  class="btn btn-info">Edit</a>
        <a href ="/delete/{{ $row->id }}" class="btn btn-danger">Delete</a>

      </td>
      
    </tr>

    @endforeach
    
   
  </tbody>
</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>