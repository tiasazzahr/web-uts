@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add new alternative</h1>
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
                            <form action="{{route('alternatives.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama:</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control"
                                            placeholder="makanan" name="nama" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Kalori :</label>
                                        <div class="input-group">
                                            <input id="name" type="number" step="0.01" class="form-control"
                                                placeholder="0.00" name="kalori" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Protein :</label>
                                            <div class="input-group">
                                                <input id="name" type="number" step="0.01" class="form-control"
                                                    placeholder="0.00" name="protein" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Karbohidrat :</label>
                                                <div class="input-group">
                                                    <input id="name" type="number" step="0.01" class="form-control"
                                                        placeholder="0.00" name="karbohidrat" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="name">Lemak :</label>
                                                    <div class="input-group">
                                                        <input id="name" type="number" step="0.01" class="form-control"
                                                            placeholder="0.00" name="lemak" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name">Gizi :</label>
                                                        <div class="input-group">
                                                            <input id="name" type="number" step="0.01" class="form-control"
                                                                placeholder="0.00" name="gizi" required>
                                                        </div>
                                </div>
                                @foreach ($criteriaweights as $cw)
                                <div class="form-group">
                                    <label for="criteria[{{$cw->id}}]">{{$cw->name}} :</label>
                                    <select class="form-control" id="criteria[{{$cw->id}}]"
                                        name="criteria[{{$cw->id}}]">
                                        <!--
                                        @php
                                            $res = $criteriaratings->where('criteria_id', $cw->id)->all();
                                        @endphp
                                        -->
                                        @foreach ($res as $cr)
                                        <option value="{{$cr->id}}">{{$cr->description}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endforeach
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
