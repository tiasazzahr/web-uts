@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Decision Matrix</h1>
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
                            <table id="mytable" class="display nowrap table table-striped table-bordered">
                                <thead>
                                   
                                    <tr>
                                        <th>#</th>
                                        <th>Alternative</th>
                                        @foreach ($criteriaweights as $c)
                                        <th>{{$c->nama}}</th>
                                        @endforeach
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $minMaxes = [];
                                    foreach ($criteriaweights as $c) {
                                        $minMax = null;
                                        if($c->type == 'benefit')
                                            $minMax = \App\Models\Alternative::max(strtolower($c->nama));
                                        else
                                            $minMax = \App\Models\Alternative::min(strtolower($c->nama));
                                        
                                        $minMaxes[$c->nama] = $minMax;
                                    }
                                    @endphp

                                    @foreach ($alternatives as $a)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{$a->nama}}</td>
                                        @php
                                            $total = 0
                                        @endphp 
                                        @foreach ($criteriaweights as $c)
                                            @if(strtolower($c->nama) == 'kalori')
                                                <td>{{ $a->kalori.'/'.$minMaxes[$c->nama].'*'.$c->weight}}</td>
                                                @php
                                                    $total += (($a->kalori / $minMaxes[$c->nama]) * $c->weight);
                                                @endphp
                                            @elseif(strtolower($c->nama) == 'protein')
                                                <td>{{$a->protein.'/'.$minMaxes[$c->nama].'*'.$c->weight}}</td>
                                                @php
                                                    $total += (($a->protein / $minMaxes[$c->nama]) * $c->weight);
                                                @endphp
                                            @elseif(strtolower($c->nama) == 'karbohidrat')
                                                <td>{{$minMaxes[$c->nama].'/'.$a->karbohidrat.'*'.$c->weight}}</td>
                                                @php
                                                    $total += (($minMaxes[$c->nama]) / $a->karbohidrat * $c->weight);
                                                @endphp
                                            @elseif(strtolower($c->nama) == 'lemak')
                                                <td>{{$minMaxes[$c->nama].'/'.$a->lemak.'*'.$c->weight}}</td>
                                                @php
                                                    $total += (($minMaxes[$c->nama]) / $a->lemak * $c->weight);
                                                @endphp
                                            @elseif(strtolower($c->nama) == 'gizi')
                                                <td>{{$a->gizi.'/'.$minMaxes[$c->nama].'*'.$c->weight}}</td>
                                                @php
                                                    $total += (($a->gizi / $minMaxes[$c->nama]) * $c->weight);
                                                @endphp
                                            @endif
                                        @endforeach
                                        <td>{{ $total }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

@section('script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

        $('#mytable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection