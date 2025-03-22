<!DOCTYPE html>
<html lang="en">

<head>
    <title>Dashboard</title>
    @include('layout.head')
</head>

<body class="bg-gray-50">
    <!-- sidenav  -->
    @include('layout.left-side')
    <!-- end sidenav -->
    <main class="md:ml-64 xl:ml-72 2xl:ml-72">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- end Navbar -->
        <div class="p-6 space-y-2">
            <div class='w-full h-fit mx-auto'>
                <div class="grid grid-cols-1 md:grid-cols-1 xl:grid-cols-3 lg:grid-cols-3 gap-4 p-2">
                    <!-- card1 -->
                    <a href="{{ route('subproduct') }}">
                        <div class="bg-blue-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold">{{ $total_product }}</h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Sub Product</h1>
                        </div>
                    </a>
                    <!-- card2 -->
                    <a href="{{ route('project') }}">
                        <div class="bg-red-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold">{{ $total_project }}</h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Projects</h1>
                        </div>
                    </a>
                    <!-- card2 -->
                    <a href="{{ route('post') }}">
                        <div class="bg-yellow-500 p-8 rounded-lg shadow-xl">
                            <h1 class="text-2xl text-white font-bold">{{ $total_post }}</h1>
                            <h1 class="text-xl font-extrabold text-white text-right">Posts</h1>
                        </div>
                    </a>
                </div>
            </div>
            <!-- chart -->
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-2 lg:grid-cols-2 ">
                <!-- chart 1-->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Project</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikProject" width="100" height="50"></canvas>
                </div>
                <!-- chart 1-->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Post</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikPost" width="100" height="50"></canvas>
                </div>

            </div>
            <!-- chart -->
            <div class="grid grid-cols-1">
                <!-- chart 2-->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Sub Products</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikProduct" width="100" height="20"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript">
        // CHART 1

        var labels1 = {{ Js::from($labels1) }};
        var data1 = {{ Js::from($data1) }};

        var data1 = {
            labels: labels1,
            datasets: [{
                label: 'Jumlah Project',
                data: data1,
                borderColor: 'rgb(75, 192, 192)',
                fill: true,
            }]
        };

        var config1 = {
            type: 'line',
            data: data1,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 50,
                    }
                }
            }
        };

        var chart1 = new Chart(
            document.getElementById('grafikProject'),
            config1
        );

        // CHART 2

        var labels2 = {{ Js::from($labels2) }};
        var data2 = {{ Js::from($data2) }};

        var data2 = {
            labels: labels2,
            datasets: [{
                label: 'Jumlah Post',
                data: data2,
                borderColor: 'rgb(75, 192, 192)',
                fill: true,
            }]
        };

        var config2 = {
            type: 'line',
            data: data2,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 50,
                    }
                }
            }
        };

        var chart2 = new Chart(
            document.getElementById('grafikPost'),
            config2
        );

        // CHART 3

        var labels3 = {{ Js::from($labels3) }};
        var data3 = {{ Js::from($data3) }};

        var data3 = {
            labels: labels3,
            datasets: [{
                label: 'Jumlah Sub Product',
                data: data3,
                borderColor: 'rgb(75, 192, 192)',
                fill: true,
            }]
        };

        var config3 = {
            type: 'line',
            data: data3,
            options: {
                animations: {
                    tension: {
                        duration: 1000,
                        easing: 'linear',
                        from: 1,
                        to: 0,
                        loop: true
                    }
                },
                scales: {
                    y: {
                        min: 0,
                        max: 50,
                    }
                }
            }
        };

        var chart3 = new Chart(
            document.getElementById('grafikProduct'),
            config3
        );
    </script>

</body>
@include('sweetalert::alert')

</html>
