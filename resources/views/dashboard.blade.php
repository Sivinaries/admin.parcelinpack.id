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
                <!-- chart 2-->
                <div class="p-6 bg-white rounded-xl shadow-xl">
                    <div>
                        <h1 class="font-light">Jumlah Products</h1>
                        <i class="fa fa-arrow-up text-lime-500"></i>
                    </div>
                    <canvas id="grafikProduct" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>
@include('sweetalert::alert')
</html>
