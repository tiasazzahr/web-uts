@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit alternative</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('alternatives.update', $alternative->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama :</label>

                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" placeholder="makanan"
                                            name="nama" value="{{ $alternative->nama }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="name"> Kalori :</label>

                                    <div class="input-group">
                                        <input id="name" type="number" step="0.01" class="form-control" placeholder="0.01"
                                            name="kalori" value="{{ $alternative->kalori }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="name"> Protein :</label>
    
                                        <div class="input-group">
                                            <input id="name" type="number" step="0.01" class="form-control" placeholder="0.01"
                                                name="protein" value="{{ $alternative->protein }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="name"> Karbohidrat :</label>
        
                                            <div class="input-group">
                                                <input id="name" type="number" step="0.01" class="form-control" placeholder="0.01"
                                                    name="karbohidrat" value="{{ $alternative->karbohidrat }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="name"> Lemak :</label>
            
                                                <div class="input-group">
                                                    <input id="name" type="number" step="0.01" class="form-control" placeholder="0.01"
                                                        name="lemak" value="{{ $alternative->lemak }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name"> Gizi :</label>
                
                                                    <div class="input-group">
                                                        <input id="name" type="number" step="0.01" class="form-control" placeholder="0.01"
                                                            name="gizi" value="{{ $alternative->gizi }}">
                                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
