<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Desa Kauman</title>

        <!--Bootstrap-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/style.css')}}">

        <!-- Chart -->
        <script src="https://code.highcharts.com/highcharts.js"></script>

        

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-md">
        <div class="container">
            @if (Route::has('login'))
                <div class="navbar-nav ml-auto">
                    @auth
                        <a class="navbar-brand" href="{{ url('/home') }}" >Home</a>
                    @else
                        <a class="navbar-brand" href="{{ route('login') }}" >Login</a>

                        @if (Route::has('register'))
                            <a class="navbar-brand" href="{{ route('register') }}" >Register</a>
                        @endif
                    @endif
                </div>
            @endif
            </div>
        </div>
        </nav>
        

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4">Pelayanan Surat<br>Desa Kauman</h1>
            </div>
        </div>

        <div class="container">
        <!-- Info Panel -->
            <div class="row justify-content-center">
                <div class="col-12 info-panel">
                    <div class="row">
                        <div class="col-lg">
                            <h4>Pengumuman 1</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="col-lg">
                            <h4>Pengumuman 2</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>
                        <div class="col-lg">
                            <h4>Pengumuman 3</h4>
                            <p>Lorem ipsum dolor sit amet.</p>
                        </div>                
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 panel">
                    <div id="chartSurat"></div>
                </div>
            </div>
        </div>
        <script>
                Highcharts.chart('chartSurat', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Grafik Permintaan Surat'
            },
            subtitle: {
                text: 'Data Tahun 2020'
            },
            xAxis: {
                categories: [
                    'Jan',
                    'Feb',
                    'Mar',
                    'Apr',
                    'Mei',
                    'Jun',
                    'Jul',
                    'Agt',
                    'Sep',
                    'Okt',
                    'Nov',
                    'Des'
                ],
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Surat'
                }
            },
            tooltip: {
                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
            series: [{
                name: 'Surat masuk',
                data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

            }, {
                name: 'Surat diproses',
                data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

            }, {
                name: 'Surat selesai',
                data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

            }]
        });
    </script>
    </body>
</html>
