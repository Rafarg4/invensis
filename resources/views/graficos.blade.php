@extends('layouts.app')

@section('content')
<section class="content-header"style="font-size: 12px;">
        <div class="container-fluid"style="font-size: 12px;">
            <div class="row mb-2">
                <div class="col-sm-6"style="font-size: 12px;">
                    
                </div>
                <div class="col-sm-6">
                
                </div>
            </div>
        </div>
         <div class="content px-3"style="font-size: 12px;">
        @include('flash::message')

        <div class="clearfix"></div>

        <div class="card"style="font-size: 12px;">
            <div class="card-body p-0">


        <figure class="highcharts-figure"style="font-size: 12px;">
            <div id="container2"style="font-size: 12px;"></div>
    
                <div class="card-footer clearfix"style="font-size: 12px;">
                    <div class="float-right"style="font-size: 12px;">
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
        </section>

<script>
    var ingreso= {!! json_encode($monto_var); !!};
    console.log(ingreso);
    Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Ingresos totales por mes'
    },
    subtitle: {
        text: 'Detalles: '
    },
    xAxis: {
        categories: ['Enero','Febrero','Marzo','Abril','Mayo',
        'Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre']
    },
    yAxis: {
        title: {
            useHTML: true,
            text: 'Selecione un mes para ver reportes'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: false,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Ingresos',
        data: ingreso





    }]
});
</script>
@endsection
