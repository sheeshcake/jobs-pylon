@extends('layout')

@section('topbar')
    @include('layout.admin.includes.topbar')
@endsection

@section('content')
    <section class="mt-4">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center">
                            <canvas id="barChart" class="w-50 h-50"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3>Dashboard</h3>
                    </div>
                    <div class="card-body">
                        <div class="col">
                            <h4>Applicants Count: {{count($data['all'])}}</h4>
                            <h4>Applicants Onboard: {{count($data['onboard'])}}</h4>
                            <h4>Applicants Pending: {{count($data['applicants'])}}</h4>
                            <h4>Jobposts: {{count($data['jobposts'])}}</h4>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('admin.applications') }}" class="btn btn-primary">Show All</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <canvas id="barChart1"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.2.0/chart.min.js" integrity="sha512-VMsZqo0ar06BMtg0tPsdgRADvl0kDHpTbugCBBrL55KmucH6hP9zWdLIWY//OTfMnzz6xWQRxQqsUFefwHuHyg==" crossorigin="anonymous"></script>
    <script>
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }



        function init_piechart(){
            var canvas = document.getElementById("barChart");
            var ctx = canvas.getContext('2d');      
            var data = {
                labels: ["Applied", "Onboard", "All"],
                datasets: [
                    {
                        fill: true,
                        backgroundColor: [
                            getRandomColor(),
                            getRandomColor(),
                            getRandomColor()
                        ],
                        data: [
                            {{count($data['applicants'])}}, 
                            {{count($data['onboard'])}}, 
                            {{count($data['all'])}}
                        ]
                    }
                ]
            };
            var options = {
                title: {
                        display: true,
                        text: 'Applicants Chart',
                        position: 'top'
                    }
            };
            var myBarChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: options
            });
        }

        function init_barchart(){
            var canvas = document.getElementById("barChart1");
            var ctx = canvas.getContext('2d'); 
            const data = {
                labels: [
                    "1", 
                    "1", 
                    "1", 
                    "1", 
                    "1", 
                    "1", 
                ],
                datasets: [{
                    label: 'My First Dataset',
                    data: [65, 59, 80, 81, 56, 55, 40],
                }]
            };
            var options = {
                title: {
                        display: true,
                        text: 'Jobpost Dashboard',
                        position: 'top'
                    },
                scales:{
                    y: {
                        beginAtZero: true,
                        }
                }
            };
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        }
        $(document).ready(function(){
            init_piechart();
            // init_barchart();
        });

    </script>
@endsection