@extends('layouts.base')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!-- Styles -->
<style>
    #chartdiv {
      width: 100%;
      height: 300px;
    }
    </style>

@section('content')
    <div class="container-fluid">
       <div class="card mb-5">
            <div class="card-header">
                <i><b>Carta Permit</b></i>
            </div>
            <div class="card-body">
                <div id="chartdiv"></div>
            </div>
        </div>
        {{-- <div class="card mb-5">
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
                </div>
            </div>--}} 
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        {{-- table --}}
                    {{-- </div> --}}
                    <div class="card-body">
                        <div><a href="/permit/create" class="btn btn-primary">Permit</a>
                        </div>
                    </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">
                                    <table id="example1" class="cell-border" style="width:100%">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="text-center">No</th>
                                                {{--<th>Permohonan ID</th>--}}
                                                <th class="text-center">Kategori</th>
                                                {{-- <th>Date</th> --}}
                                                <th class="text-center">Details</th>
                                                <th class="text-center">Print</th>
                                                <th></th>
                                                {{-- <th>Edit</th>
                                                <th>Edit Harga</th>
                                                <th>Delete</th>--}} 
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($permit as $key => $p)
                                            <tr>
                                                {{-- <td>{{ $p->id }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{ $key + 1}}</td>
                                                {{-- <td>{{ $s->permohonan_ID }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{ $p->kategori }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $p->details }}</td>
                                                {{-- <td>{{ $p->print_permit }}</td> --}}
                                                {{-- <td>{{ $p->keluaran }}</td> --}}
                                                {{-- <td>RM {{ $k->harga_kereta }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;"><a href="/storage/{{ $p->print_permit }}" target="_blank" download="">Cetak</a></td>
                                                {{-- <td><img src="/storage/{{ $p->file_permit }}" alt="" style="width: 50px"></td> --}}
                                    {{-- <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td> --}}
                                    {{-- <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a>  --}}
                                                </td>
                                                <td>
                                                    <form action="/permit/{{ $p->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-outline-dark btn-sm">Delete</button>
                                                        </div>
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

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
$('#example1').DataTable();
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
        var chart = root.container.children.push(am5radar.RadarChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "panX",
        wheelY: "zoomX",
        innerRadius: am5.percent(20),
        startAngle: -90,
        endAngle: 180
        }));


        // Data
        var data = [{
        category: "Permohonan Permit Baru",
        value: 80,
        full: 100,
        columnSettings: {
            fill: chart.get("colors").getIndex(0)
        }
        }, {
        category: "Perbaharui Permit",
        value: 35,
        full: 100,
        columnSettings: {
            fill: chart.get("colors").getIndex(1)
        }
        }, {
        category: "Kadar Kelulusan Permit",
        value: 92,
        full: 100,
        columnSettings: {
            fill: chart.get("colors").getIndex(2)
        }
        }, {
        category: "Proses menunggu kelulusan permit",
        value: 68,
        full: 100,
        columnSettings: {
            fill: chart.get("colors").getIndex(3)
        }
        }];

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Cursor
        var cursor = chart.set("cursor", am5radar.RadarCursor.new(root, {
        behavior: "zoomX"
        }));

        cursor.lineY.set("visible", false);

        // Create axes and their renderers
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_axes
        var xRenderer = am5radar.AxisRendererCircular.new(root, {
        //minGridDistance: 50
        });

        xRenderer.labels.template.setAll({
        radius: 10
        });

        xRenderer.grid.template.setAll({
        forceHidden: true
        });

        var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        renderer: xRenderer,
        min: 0,
        max: 100,
        strictMinMax: true,
        numberFormat: "#'%'",
        tooltip: am5.Tooltip.new(root, {})
        }));


        var yRenderer = am5radar.AxisRendererRadial.new(root, {
        minGridDistance: 20
        });

        yRenderer.labels.template.setAll({
        centerX: am5.p100,
        fontWeight: "500",
        fontSize: 18,
        templateField: "columnSettings"
        });

        yRenderer.grid.template.setAll({
        forceHidden: true
        });

        var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "category",
        renderer: yRenderer
        }));

        yAxis.data.setAll(data);


        // Create series
        // https://www.amcharts.com/docs/v5/charts/radar-chart/#Adding_series
        var series1 = chart.series.push(am5radar.RadarColumnSeries.new(root, {
        xAxis: xAxis,
        yAxis: yAxis,
        clustered: false,
        valueXField: "full",
        categoryYField: "category",
        fill: root.interfaceColors.get("alternativeBackground")
        }));

        series1.columns.template.setAll({
        width: am5.p100,
        fillOpacity: 0.08,
        strokeOpacity: 0,
        cornerRadius: 20
        });

        series1.data.setAll(data);


        var series2 = chart.series.push(am5radar.RadarColumnSeries.new(root, {
        xAxis: xAxis,
        yAxis: yAxis,
        clustered: false,
        valueXField: "value",
        categoryYField: "category"
        }));

        series2.columns.template.setAll({
        width: am5.p100,
        strokeOpacity: 0,
        tooltipText: "{category}: {valueX}%",
        cornerRadius: 20,
        templateField: "columnSettings"
        });

        series2.data.setAll(data);

        // Animate chart and series in
        // https://www.amcharts.com/docs/v5/concepts/animations/#Initial_animation
        series1.appear(1000);
        series2.appear(1000);
        chart.appear(1000, 100);

        }); // end am5.ready()
        </script>
@endsection
