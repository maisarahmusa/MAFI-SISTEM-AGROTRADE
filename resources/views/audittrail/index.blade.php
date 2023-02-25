@extends('layouts.base')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<style>
    #chartdiv {
      width: 100%;
      height: 200px;
    }
    </style>



@section('content')
    <div class="container-fluid">
       <div class="card mb-5">
            <div class="card-header">
                <b><i>Carta Audit Trail</i></b>
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
                        {{-- table
                    </div> --}}
                    <div class="card-body">
                        <div><a href="/audittrail/create" class="btn btn-primary">Audit Trail</a>
                        </div>
                    </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">

                                    <!--class can change to any other types by using DataTables-->
                                    
                                    <table id="example3" class="cell-border" style="width:100%">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Activity</th>
                                                <th class="text-center">User</th>
                                                <th class="text-center">Print</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($audittrail as $key => $at )
                                            <tr>
                                                {{-- <td>{{ $at->id }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{$key + 1}}</td>
                                                {{-- <td>{{ $s->permohonan_ID }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{ $at->activity }}</td>
                                                {{-- <td>{{ $at->date }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{ $at->user }}</td>
                                                {{-- <td>{{ $at->print_audittrail }}</td> --}}
                                                {{-- <td>RM {{ $k->harga_kereta }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;"><a href="/storage/{{$at->print_audit}}" target="_blank" download>Cetak</a></td> 
                                                {{-- <td><img src="/storage/{{ $k->file_kereta }}" alt="" style="width: 50px"></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a> --}}
                                                </td>
                                                <td>
                                                    <form action="/audittrail/{{ $at->id }}" method="post">
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
        $('#example3').DataTable();
    } );
    
    </script>

    <!--Carta Audit Trail-->

            <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
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
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(am5xy.XYChart.new(root, {
        panX: false,
        panY: false,
        wheelX: "none",
        wheelY: "none",
        layout: root.horizontalLayout
        }));


        // Add legend
        // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
        var legendData = [];
        var legend = chart.children.push(
        am5.Legend.new(root, {
            nameField: "name",
            fillField: "color",
            strokeField: "color",
            //centerY: am5.p50,
            marginLeft: 20,
            y: 20,
            layout: root.verticalLayout,
            clickTarget: "none"
        })
        );

        var data = [{
        region: "Statistik",
        state: "Kobis Bulat",
        sales: 60454
        }, {
        region: "Statistik",
        state: "Susu Cair",
        sales: 200000
        }, {
        region: "Statistik",
        state: "Kelapa Biji Tua",
        sales: 338656
        }, {
        region: "Statistik",
        state: "Beras",
        sales: 457731
        }];


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
        categoryField: "state",
        renderer: am5xy.AxisRendererY.new(root, {
            minGridDistance: 10
        }),
        tooltip: am5.Tooltip.new(root, {})
        }));

        yAxis.get("renderer").labels.template.setAll({
        fontSize: 12,
        location: 0.5
        })

        yAxis.data.setAll(data);

        var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
        renderer: am5xy.AxisRendererX.new(root, {}),
        tooltip: am5.Tooltip.new(root, {})
        }));


        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.ColumnSeries.new(root, {
        xAxis: xAxis,
        yAxis: yAxis,
        valueXField: "sales",
        categoryYField: "state",
        tooltip: am5.Tooltip.new(root, {
            pointerOrientation: "horizontal"
        })
        }));

        series.columns.template.setAll({
        tooltipText: "{categoryY}: [bold]{valueX}[/]",
        width: am5.percent(90),
        strokeOpacity: 0
        });

        series.columns.template.adapters.add("fill", function(fill, target) {
        if (target.dataItem) {
            switch(target.dataItem.dataContext.region) {
            case "Statistik":
                return chart.get("colors").getIndex(3);
                break;
            }
        }
        return fill;
        })

        series.data.setAll(data);

        function createRange(label, category, color) {
        var rangeDataItem = yAxis.makeDataItem({
            category: category
        });
        
        var range = yAxis.createAxisRange(rangeDataItem);
        
        rangeDataItem.get("label").setAll({
            fill: color,
            text: label,
            location: 1,
            fontWeight: "bold",
            dx: -130
        });

        rangeDataItem.get("grid").setAll({
            stroke: color,
            strokeOpacity: 1,
            location: 1
        });
        
        rangeDataItem.get("tick").setAll({
            stroke: color,
            strokeOpacity: 1,
            location: 1,
            visible: true,
            length: 130
        });
        
        legendData.push({ name: label, color: color });
        
        }

        createRange("Statistik", "Beras", chart.get("colors").getIndex(3));

        legend.data.setAll(legendData);

        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
        xAxis: xAxis,
        yAxis: yAxis
        }));


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
        chart.appear(1000, 100);

        }); // end am5.ready()
        </script>


@endsection
