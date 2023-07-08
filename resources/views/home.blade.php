@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Home</h1>
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
                        <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">
                                    Selamat datang di Sistem Pendukung Keputusan :)</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            Sistem ini dapat membantu seseorang untuk mengambil keputusan dengan menggunakan Simple Additive Weighting Algorithm.
                            <br> 
                            Cara Penggunaan:
                            <ol>
                                <li>Masuk ke menu Criteria & Weight untuk menambahkan kriteria keputusan dan bobotnya (
                                    itu pentingnya kriteria).</li>
                                <li>Kemudian masuk ke menu Criteria Rating untuk memberikan pilihan rating pada masing-masing kriteria.</li>
                                <li>Gunakan menu Alternatif untuk menambahkan alternatif (kandidat) dan ratingnya.</li>
                                <li>Centang menu Peringkat untuk melihat hasilnya, klik kolom Total pada tabel yang akan diurutkan
                                    dengan nilai totalnya.</li>
                            </ol>
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