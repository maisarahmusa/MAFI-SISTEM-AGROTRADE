@extends('layouts.base')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.amcharts.com/lib/5/Animated"> --}}

<!-- Styles -->
<style>
    #chartdiv{
    width: 80%;
    height: 200px;
}

    #chartdiv2 {
  width: 60%;
  height: 500px;
}
    #chartdiv3 {
  width: 80%;
  height: 300px
}

</style>
    
@section('content')
    {{-- <a>You're logged in!</a> --}}
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header">
                <b>You're logged in!</b>
            </div>
        </div>
    </div>
    <br></br>

    <div class="container-fluid">
        <div class="card mb-5">
            <div class="card-header">
                <b>AgroTrade</b>
            </div>
            <div class="card-body">
                <div id="chartdiv"></div>
        </div>
    </div>
        <div class="card mb-5">
            <div class="card-header">
                <b>Keluaran</b>
            </div>
            <div class="card-body">
                <div id="chartdiv2"></div>
            </div>
        </div>
    </div>
    {{-- <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-header">
                    Chart 3
                </div>
                <div class="card-body">
                    12345
                </div>
                <div id="chartdiv3"></div>
            </div>
       </div>
    </div> --}}
    
    <!-- Resources 1-->
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
                category: "Beras",
                value: 501.9
            }, {
                category: "Kobis Bulat",
                value: 301.9
            }, {
                category: "Kelapa Biji Tua",
                value: 201.1
            }, {
                category: "Susu Cair",
                value: 165.8
            }
            //, {
            //     category: "Naziran",
            //     value: 139.9
            // }, {
            //     category: "Null",
            //     value: 128.3
            // }, {
            //     category: "krik krik",
            //     value: 99
            // }
            ]);

            series.appear(1000, 100);

        }); // end am5.ready()
    </script>

            <!-- Resources 2-->
        {{-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script> --}}
        <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
        {{-- <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script> --}}
               <!-- Chart code -->
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
        
        var data = [
        {
            name: "Beras",
            steps: 45688,
            pictureSettings: {
            src: "/beras.jpeg"
            }
        },
        {
            name: "Kobis Bulat",
            steps: 35781,
            pictureSettings: {
            src: "/kobis-bulat.jpeg"
            }
        },
        {
            name: "Kelapa Biji Tua",
            steps: 25464,
            pictureSettings: {
            src: "kelapabijitua.jpeg"
            }
        },
        {
            name: "Susu Cair",
            steps: 18788,
            pictureSettings: {
            src: "/susucair.jpg"
            }
        },
        // {
        //     name: "Rachel",
        //     steps: 15465,
        //     pictureSettings: {
        //     src: "https://www.amcharts.com/wp-content/uploads/2019/04/rachel.jpg"
        //     }
        // },
        // {
        //     name: "Chandler",
        //     steps: 11561,
        //     pictureSettings: {
        //     src: "https://www.amcharts.com/wp-content/uploads/2019/04/chandler.jpg"
        //     }
        // }
        ];
        
        // Create chart
        // https://www.amcharts.com/docs/v5/charts/xy-chart/
        var chart = root.container.children.push(
        am5xy.XYChart.new(root, {
            panX: false,
            panY: false,
            wheelX: "none",
            wheelY: "none",
            paddingLeft: 50,
            paddingRight: 40
        })
        );
        
        // Create axes
        // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
        
        var yRenderer = am5xy.AxisRendererY.new(root, {});
        yRenderer.grid.template.set("visible", false);
        
        var yAxis = chart.yAxes.push(
        am5xy.CategoryAxis.new(root, {
            categoryField: "name",
            renderer: yRenderer,
            paddingRight:40
        })
        );
        
        var xRenderer = am5xy.AxisRendererX.new(root, {});
        xRenderer.grid.template.set("strokeDasharray", [3]);
        
        var xAxis = chart.xAxes.push(
        am5xy.ValueAxis.new(root, {
            min: 0,
            renderer: xRenderer
        })
        );
        
        // Add series
        // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
        var series = chart.series.push(
        am5xy.ColumnSeries.new(root, {
            name: "Income",
            xAxis: xAxis,
            yAxis: yAxis,
            valueXField: "steps",
            categoryYField: "name",
            sequencedInterpolation: true,
            calculateAggregates: true,
            maskBullets: false,
            tooltip: am5.Tooltip.new(root, {
            dy: -30,
            pointerOrientation: "vertical",
            labelText: "{valueX}"
            })
        })
        );
        
        series.columns.template.setAll({
        strokeOpacity: 0,
        cornerRadiusBR: 10,
        cornerRadiusTR: 10,
        cornerRadiusBL: 10,
        cornerRadiusTL: 10,
        maxHeight: 50,
        fillOpacity: 0.8
        });
        
        var currentlyHovered;
        
        series.columns.template.events.on("pointerover", function(e) {
        handleHover(e.target.dataItem);
        });
        
        series.columns.template.events.on("pointerout", function(e) {
        handleOut();
        });
        
        function handleHover(dataItem) {
        if (dataItem && currentlyHovered != dataItem) {
            handleOut();
            currentlyHovered = dataItem;
            var bullet = dataItem.bullets[0];
            bullet.animate({
            key: "locationX",
            to: 1,
            duration: 600,
            easing: am5.ease.out(am5.ease.cubic)
            });
        }
        }
        
        function handleOut() {
        if (currentlyHovered) {
            var bullet = currentlyHovered.bullets[0];
            bullet.animate({
            key: "locationX",
            to: 0,
            duration: 600,
            easing: am5.ease.out(am5.ease.cubic)
            });
        }
        }
        
        
        var circleTemplate = am5.Template.new({});
        
        series.bullets.push(function(root, series, dataItem) {
        var bulletContainer = am5.Container.new(root, {});
        var circle = bulletContainer.children.push(
            am5.Circle.new(
            root,
            {
                radius: 34
            },
            circleTemplate
            )
        );
        
        var maskCircle = bulletContainer.children.push(
            am5.Circle.new(root, { radius: 27 })
        );
        
        // only containers can be masked, so we add image to another container
        var imageContainer = bulletContainer.children.push(
            am5.Container.new(root, {
            mask: maskCircle
            })
        );
        
        // not working
        var image = imageContainer.children.push(
            am5.Picture.new(root, {
            templateField: "pictureSettings",
            centerX: am5.p50,
            centerY: am5.p50,
            width: 60,
            height: 60
            })
        );
        
        return am5.Bullet.new(root, {
            locationX: 0,
            sprite: bulletContainer
        });
        });
        
        // heatrule
        series.set("heatRules", [
        {
            dataField: "valueX",
            min: am5.color(0xe5dc36),
            max: am5.color(0x5faa46),
            target: series.columns.template,
            key: "fill"
        },
        {
            dataField: "valueX",
            min: am5.color(0xe5dc36),
            max: am5.color(0x5faa46),
            target: circleTemplate,
            key: "fill"
        }
        ]);
        
        series.data.setAll(data);
        yAxis.data.setAll(data);
        
        var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {}));
        cursor.lineX.set("visible", false);
        cursor.lineY.set("visible", false);
        
        cursor.events.on("cursormoved", function() {
        var dataItem = series.get("tooltip").dataItem;
        if (dataItem) {
            handleHover(dataItem)
        }
        else {
            handleOut();
        }
        })
        
        // Make stuff animate on load
        // https://www.amcharts.com/docs/v5/concepts/animations/
        series.appear();
        chart.appear(1000, 100);
        
        }); // end am5.ready()
        </script>
    
                

    
@endsection