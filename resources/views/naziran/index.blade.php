@extends('layouts.base')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-- Styles -->
<style>
    #chartdiv {
      width: 100%;
      height: 500px;
      font-size: 8pt
    }
</style>

@section('content')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css"> --}}

    <div class="container-fluid">
        <!--test-->
       <div class="card mb-5">
            <div class="card-header">
                <i><b>Carta Naziran</b></i>
            </div>
            <div class="card-body">
                <div id="chartdiv"></div>
            </div>
        {{-- </div>
        <div class="card mb-5">
            <div class="card-header">
                Chart 2
            </div>
            <div class="card-body">
                <div id="chartdiv2"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Chart 3
                    </div>
                    <div class="card-body">
                        12345
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        Chart 4
                    </div>
                    <div class="card-body">
                        6789
                    </div>
                    <div id="chartdiv4"></div>
                </div>--}}
            </div> 
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        {{-- table --}}
                    {{-- </div> --}}
                    <div class="card-body">
                        <div><a href="/naziran/create" class="btn btn-primary">Naziran</a>
                        </div>
                    </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">
                                    <table id="example" class="cell-border" style="width:100%">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Pemerhatian</th>
                                                <th class="text-center">Maklum Balas</th>
                                                <th class="text-center">Print</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($naziran as $key => $n)
                                            <tr>
                                            
                                                <td style="text-align: center; vertical-align: middle;">{{$key + 1}}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $n->subject }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $n->pemerhatian }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $n->maklumBalas }}</td>
 
                                                <td style="text-align: center; vertical-align: middle;"><a href="/storage/{{ $n->print_naziran }}" target="_blank" download>Cetak</a></td>
                                                {{-- <td><img src="/storage/{{ $k->file_kereta }}" alt="" style="width: 50px"></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a> --}}
                                                </td>
                                                <td>
                                                    <form action="/naziran/{{ $n->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-dark btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
  
<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
<script>
        $(document).ready( function () {
    $('#example').DataTable();
} );

        </script>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

        <!-- Chart code -->
        <script>
        am5.ready(function() {

        // Create root element
        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
        var root = am5.Root.new("chartdiv");

        // Set themes
        // https://www.amcharts.com/docs/v5/concepts/themes/
        root.setThemes([
        am5themes_Animated.new(root)
        ]);

        // Create chart
        // https://www.amcharts.com/docs/v5/charts/radar-chart/
        var chart = root.container.children.push(
        am5radar.RadarChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "panX",
            wheelY: "zoomX",
            innerRadius: am5.percent(40),
            radius: am5.percent(70),
            arrangeTooltips: false
        })
        );

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Cursor
        var cursor = chart.set("cursor", am5radar.RadarCursor.new(root, {
        behavior: "zoomX"
        }));

        cursor.lineY.set("visible", false);

        // Create axes and their renderers
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_axes
        var xRenderer = am5radar.AxisRendererCircular.new(root, {
        minGridDistance: 30
        });
        xRenderer.labels.template.setAll({
        textType: "radial",
        radius: 10,
        paddingTop: 0,
        paddingBottom: 0,
        centerY: am5.p50,
        fontSize: "0.8em"
        });

        xRenderer.grid.template.setAll({
        location: 0.5,
        strokeDasharray: [2, 2]
        });

        var xAxis = chart.xAxes.push(
        am5xy.CategoryAxis.new(root, {
            maxDeviation: 0,
            categoryField: "name",
            renderer: xRenderer,
            tooltip: am5.Tooltip.new(root, {})
        })
        );

        var yRenderer = am5radar.AxisRendererRadial.new(root, {
        minGridDistance: 30
        });

        var yAxis = chart.yAxes.push(
        am5xy.ValueAxis.new(root, {
            renderer: yRenderer
        })
        );

        yRenderer.grid.template.setAll({
        strokeDasharray: [2, 2]
        });

        // Create series
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_series
        var series1 = chart.series.push(
        am5radar.RadarLineSeries.new(root, {
            name: "Pengurusan Naziran (Dalam Proses)",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value1",
            categoryXField: "name"
        })
        );

        series1.strokes.template.setAll({
        strokeOpacity: 0
        });

        series1.fills.template.setAll({
        visible: true,
        fillOpacity: 0.5
        });

        var series2 = chart.series.push(
        am5radar.RadarLineSeries.new(root, {
            name: "Pengurusan Laporan Naziran",
            xAxis: xAxis,
            yAxis: yAxis,
            valueYField: "value2",
            categoryXField: "name",
            stacked: true,
            tooltip: am5.Tooltip.new(root, {
            labelText: "Outside: {value1}\nInside:{value2}"
            })
        })
        );

        series2.strokes.template.setAll({
        strokeOpacity: 0
        });

        series2.fills.template.setAll({
        visible: true,
        fillOpacity: 0.5
        });

        var legend = chart.radarContainer.children.push(
        am5.Legend.new(root, {
            width: 150,
            centerX: am5.p50,
            centerY: am5.p50
        })
        );
        legend.data.setAll([series1, series2]);

        // Set data
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Setting_data
        var data = [
        {
            name: "Kelulusan Permit",
            value1: 160.2,
            value2: 66.9
        },
        {
            name: "Info Naziran",
            value1: 52.9,
            value2: 96.3
        },
        {
            name: "Pengurusan Naziran",
            value1: 42.9,
            value2: 11.9
        },
        {
            name: "Hak Cipta Terpelihara",
            value1: 40.9,
            value2: 16.8
        },
        {
            name: "Pasaran AgroTrade",
            value1: 39.2,
            value2: 9.9
        }];

        series1.data.setAll(data);
        series2.data.setAll(data);
        xAxis.data.setAll(data);

        // Animate chart and series in
        // https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
        series1.appear(1000);
        series2.appear(1000);
        chart.appear(1000, 100);

        }); // end am5.ready()
        </script>

@endsection
