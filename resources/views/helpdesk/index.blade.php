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
                <b><i>Carta Helpdesk</b></i>
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
                </div> --}}
            </div>
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        {{-- table
                    </div> --}}
                    <div class="card-body">
                        <div><a href="/helpdesk/create" class="btn btn-primary">Helpdesk</a>
                        </div>
                    </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">
                                    <table id="example4" class="cell-border" style="width:100%">
                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Subject</th>
                                                <th class="text-center">Details</th>
                                                <th class="text-center">Print Helpdesk</th>
                                                <th></th> 
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($helpdesk as $key => $h)
                                            <tr>
                                                {{-- <td>{{ $h->id }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{$key + 1}}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $h->subject }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $h->details }}</td>
                                                {{-- <td>{{ $h->print_helpdesk }}</td> --}}
                                                {{-- <td><img src="/storage/{{ $h->file_helpdesk }}" alt="" style="width: 50px"></td> --}}
                                                {{-- <td>RM {{ $k->harga_kereta }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;"><a href="/storage/{{ $h->print_helpdesk }}" target="_blank" download>Cetak</a></td>
                                                {{-- <td><img src="/storage/{{ $k->file_kereta }}" alt="" style="width: 50px"></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a> --}}
                                                </td>
                                                <td>
                                                    <form action="/helpdesk/{{ $h->id }}" method="post">
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
    $('#example4').DataTable();
} );

</script>


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
        panX: true,
        panY: true,
        wheelX: "panX",
        wheelY: "zoomX",
        pinchZoomX:true
        }));

        chart.get("colors").set("step", 3);


        // Add cursor
        // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineY.set("visible", false);


        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        var xAxis = chart.xAxes.push(am5xy.DateAxis.new(root, {
        maxDeviation: 0.3,
        baseInterval: {
            timeUnit: "day",
            count: 1
        },
        renderer: am5xy.AxisRendererX.new(root, {}),
        tooltip: am5.Tooltip.new(root, {})
        }));

        var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
        maxDeviation: 0.3,
        renderer: am5xy.AxisRendererY.new(root, {})
        }));


        // Create series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(am5xy.LineSeries.new(root, {
        name: "Series 1",
        xAxis: xAxis,
        yAxis: yAxis,
        valueYField: "value",
        valueXField: "date",
        tooltip: am5.Tooltip.new(root, {
            labelText: "{valueY}"
        })
        }));
        series.strokes.template.setAll({
        strokeWidth: 2,
        strokeDasharray: [3, 3]
        });

        // Create animating bullet by adding two circles in a bullet container and
        // animating radius and opacity of one of them.
        series.bullets.push(function(root, series, dataItem) {  
        if (dataItem.dataContext.bullet) {    
            var container = am5.Container.new(root, {});
            var circle0 = container.children.push(am5.Circle.new(root, {
            radius: 5,
            fill: am5.color(0xff0000)
            }));
            var circle1 = container.children.push(am5.Circle.new(root, {
            radius: 5,
            fill: am5.color(0xff0000)
            }));

            circle1.animate({
            key: "radius",
            to: 20,
            duration: 1000,
            easing: am5.ease.out(am5.ease.cubic),
            loops: Infinity
            });
            circle1.animate({
            key: "opacity",
            to: 0,
            from: 1,
            duration: 1000,
            easing: am5.ease.out(am5.ease.cubic),
            loops: Infinity
            });

            return am5.Bullet.new(root, {
            sprite: container
            })
        }
        })

        // Set data
        var data = [{
        date: new Date(2022, 6, 13).getTime(),
        value: 0
        }, {
        date: new Date(2022, 6, 14).getTime(),
        value: 33
        }, {
        date: new Date(2022, 6, 15).getTime(),
        value: 22
        }, {
        date: new Date(2022, 6, 16).getTime(),
        value: 52
        }, {
        date: new Date(2022, 6, 17).getTime(),
        value: 48
        }, {
        date: new Date(2022, 6, 18).getTime(),
        value: 30
        }, {
        date: new Date(2022, 6, 19).getTime(),
        value: 59,
        bullet: true
        }]

        series.data.setAll(data);


        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear(1000);
        chart.appear(1000, 100);

        }); // end am5.ready()
        </script>
@endsection
