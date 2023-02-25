@extends('layouts.base')

<!-- Styles -->
{{--<style>
    #chartdiv {
        width: 100%;
        height: 500px;
    }

    #chartdiv2 {
        width: 100%;
        height: 500px;
    }

    #chartdiv3 {
        width: 100%;
        height: 500px;
    }
</style>--}}
@section('content')
    <div class="container-fluid">
       {{--} <div class="card mb-5">
            <div class="card-header">
                Chart 1
            </div>
            <div class="card-body">
                <div id="chartdiv"></div>
            </div>
        </div>
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
                </div>
            </div>--}}
            <div class="col-12">
                <div class="card mt-4">
                    <div class="card-header">
                        table
                    </div>
                    <div class="card-body">
                        <div><a href="/admin/create" class="btn">Admin</a>
                        </div>
                        <div data-list='{"valueNames":["name","email","age"],"page":5,"pagination":true}'>
                            <div class="table-responsive scrollbar">
                                <table class="table table-bordered table-striped fs--1 mb-0">
                                    <thead class="bg-200 text-900">
                                        <tr>
                                            <th>No</th>
                                            {{--<th>Permohonan ID</th>--}}
                                            <th>Name</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th colspan="2">Tindakan</th>
                                            
                                            {{-- <th>Edit</th>
                                <th>Edit Harga</th>
                                <th>Delete</th>--}} 
                                        </tr>
                                    </thead>
                                    <tbody class="list">
                                        @foreach ($admin as $a)
                                            <tr>
                                                <td>{{ $a->id }}</td>
                                                {{-- <td>{{ $s->permohonan_ID }}</td> --}}
                                                <td>{{ $a->name }}</td>
                                                <td>{{ $a->username }}</td>
                                                <td>{{ $a->password }}</td>
                                                <td>{{ $a->email }}</td>
                                                {{-- <td>RM {{ $k->harga_kereta }}</td> --}}
                                                {{-- <td><a href="/storage/{{ $k->file_kereta }}" target="_blank">{{ $k->file_kereta }}</a></td> --}}
                                                {{-- <td><img src="/storage/{{ $k->file_kereta }}" alt="" style="width: 50px"></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit" class="btn">Edit</a></td>
                                    <td><a href="/kereta/{{ $k->id }}/edit-harga" class="btn">Edit Harga</a> --}}
                                                </td>
                                                <td>
                                                    <form action="/admin/{{ $a->id }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn">Delete</button>
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="/admin/{{$admin->id}}/edit">Kemaskini</a>
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

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

    <!-- Chart 1 code -->
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
            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    endAngle: 270
                })
            );

            // Create series
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
            var series = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "value",
                    categoryField: "category",
                    endAngle: 270
                })
            );

            series.states.create("hidden", {
                endAngle: -90
            });

            // Set data
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series.data.setAll([{
                category: "Proton",
                value: 501.9
            }, {
                category: "Toyota",
                value: 301.9
            }, {
                category: "Mazda",
                value: 201.1
            }, {
                category: "Honda",
                value: 165.8
            }, {
                category: "Mercedes",
                value: 139.9
            }, {
                category: "Perodua",
                value: 128.3
            }, {
                category: "krik krik",
                value: 99
            }]);

            series.appear(1000, 100);

        }); // end am5.ready()
    </script>
    <!-- Chart 2 code -->
    <script>
        am5.ready(function() {

            // Create root element
            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
            var root = am5.Root.new("chartdiv2");

            // Set themes
            // https://www.amcharts.com/docs/v5/concepts/themes/
            root.setThemes([
                am5themes_Animated.new(root)
            ]);

            // Create chart
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
            var chart = root.container.children.push(
                am5percent.PieChart.new(root, {
                    startAngle: 160,
                    endAngle: 380
                })
            );

            // Create series
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series

            var series0 = chart.series.push(
                am5percent.PieSeries.new(root, {
                    valueField: "litres",
                    categoryField: "country",
                    startAngle: 160,
                    endAngle: 380,
                    radius: am5.percent(70),
                    innerRadius: am5.percent(65)
                })
            );

            var colorSet = am5.ColorSet.new(root, {
                colors: [series0.get("colors").getIndex(0)],
                passOptions: {
                    lightness: -0.05,
                    hue: 0
                }
            });

            series0.set("colors", colorSet);

            series0.ticks.template.set("forceHidden", true);
            series0.labels.template.set("forceHidden", true);

            var series1 = chart.series.push(
                am5percent.PieSeries.new(root, {
                    startAngle: 160,
                    endAngle: 380,
                    valueField: "bottles",
                    innerRadius: am5.percent(80),
                    categoryField: "country"
                })
            );

            series1.ticks.template.set("forceHidden", true);
            series1.labels.template.set("forceHidden", true);

            var label = chart.seriesContainer.children.push(
                am5.Label.new(root, {
                    textAlign: "center",
                    centerY: am5.p100,
                    centerX: am5.p50,
                    text: "[fontSize:18px]total[/]:\n[bold fontSize:30px]1647.9[/]"
                })
            );

            var data = [{
                    country: "Chart 2 Testing 1",
                    litres: 501.9,
                    bottles: 1500
                },
                {
                    country: "Chart 2 Testing 2",
                    litres: 301.9,
                    bottles: 990
                },
                {
                    country: "Chart 2 Testing 3",
                    litres: 201.1,
                    bottles: 785
                },
                {
                    country: "Germany",
                    litres: 165.8,
                    bottles: 255
                },
                {
                    country: "Australia",
                    litres: 139.9,
                    bottles: 452
                },
                {
                    country: "Austria",
                    litres: 128.3,
                    bottles: 332
                },
                {
                    country: "UK",
                    litres: 99,
                    bottles: 150
                },
                {
                    country: "Belgium",
                    litres: 60,
                    bottles: 178
                },
                {
                    country: "The Netherlands",
                    litres: 50,
                    bottles: 50
                }
            ];

            // Set data
            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
            series0.data.setAll(data);
            series1.data.setAll(data);

        }); // end am5.ready()
    </script>
@endsection
