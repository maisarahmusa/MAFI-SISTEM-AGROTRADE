@extends('layouts.base')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<!-- Styles -->
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
                <i><b>Carta Laporan Dashboard</b></i>
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
                        <div><a href="/laporandashboard/create" class="btn btn-primary">Laporan Dashboard</a>
                        </div>
                    </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">

                                       <!--table code-->
                                    <table id="example2" class="cell-border" style="width:100%">

                                        <thead class="bg-200 text-900">
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th class="text-center">Tajuk Laporan</th>
                                                <th class="text-center">Detail Laporan</th>
                                                <th class="text-center">Jenis Laporan</th>
                                                <th class="text-center">Print</th>
                                                <th class="text-center">Tindakan</th>
                                                <th></th> 
                                            </tr>
                                        </thead>
                                    <tbody>
                                        @foreach ($laporandashboard as $key => $ld)
                                            <tr>
                                                {{-- <td>{{ $ld->id }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;">{{$key + 1}}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $ld->tajukLaporan }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $ld->detailLaporan }}</td>
                                                <td style="text-align: center; vertical-align: middle;">{{ $ld->jenisLaporan }}</td>
                                                {{-- <td>{{ $ld->print_laporandashboard }}</td> --}}
                                                <td style="text-align: center; vertical-align: middle;"><a href="/storage/{{ $ld->print_laporan }}" target="_blank" download>Cetak</a></td>
                                                <td style="text-align: center; vertical-align: middle;"><a href="/laporandashboard/{{$ld->id}}/edit">Kemaskini</a></td>
                                                {{-- <td>RM {{ $k->harga_kereta }}</td> --}}
                                                {{-- <td><a href="/storage/{{ $k->file_kereta }}" target="_blank">{{ $k->file_kereta }}</a></td> --}}
                                                {{-- <td><img src="/storage/{{ $k->file_kereta }}" alt="" style="width: 50px"></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a> --}}
                                                </td>
                                                <td>
                                                    <form action="/laporandashboard/{{ $ld->id }}" method="post">
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

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    
<script>
        $(document).ready( function () {
    $('#example2').DataTable();
} );

</script>

        <!-- Resources -->
        <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
        <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
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
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
        layout: root.verticalLayout
        }));


        // Create series
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
        var series = chart.series.push(am5percent.PieSeries.new(root, {
        alignLabels: true,
        calculateAggregates: true,
        valueField: "value",
        categoryField: "category"
        }));

        series.slices.template.setAll({
        strokeWidth: 3,
        stroke: am5.color(0xffffff)
        });

        series.labelsContainer.set("paddingTop", 30)


        // Set up adapters for variable slice radius
        // https://www.amcharts.com/docs/v5/concepts/settings/adapters/
        series.slices.template.adapters.add("radius", function (radius, target) {
        var dataItem = target.dataItem;
        var high = series.getPrivate("valueHigh");

        if (dataItem) {
            var value = target.dataItem.get("valueWorking", 0);
            return radius * value / high
        }
        return radius;
        });


        // Set data
        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
        series.data.setAll([{
        value: 10,
        category: "Naziran"
        }, {
        value: 9,
        category: "Helpdesk"
        }, {
        value: 6,
        category: "Permohonan"
        }, {
        value: 5,
        category: "Permit"
        }]);


        // Create legend
        // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
        var legend = chart.children.push(am5.Legend.new(root, {
        centerX: am5.p50,
        x: am5.p50,
        marginTop: 15,
        marginBottom: 15
        }));

        legend.data.setAll(series.dataItems);


        // Play initial series animation
        // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
        series.appear(1000, 100);

        }); // end am5.ready()
        </script>


@endsection
