<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profile</title>
    @include('layout.head')
</head>

<body class="bg-gray-50">
    <!-- Sidebar -->
    @include('layout.left-side')

    <main class="md:ml-64 xl:ml-72 2xl:ml-72">
        <!-- Navbar -->
        @include('layout.navbar')
        <div class="p-6">

            <div class='w-full rounded-xl bg-white h-fit p-3'>
                <div class="flex items-center space-x-4">
                    <img class="w-12 h-12 rounded-full" src="{{ asset('assets/img/logo.png') }}" alt="Profile Picture">
                    <h1 class="text-xl font-semibold text-gray-900">{{ auth()->user()->name }}</h1>
                </div>

                <div class="mt-6 border-t border-gray-200 pt-4">
                    <h6 class="text-lg font-semibold text-gray-700">Profile Information</h6>
                    <ul class="mt-3 space-y-3">
                        <li class="flex justify-between border-b pb-2">
                            <strong class="text-gray-600">Name:</strong>
                            <span class="text-gray-800">{{ auth()->user()->name }}</span>
                        </li>
                        <li class="flex justify-between border-b pb-2">
                            <strong class="text-gray-600">Email:</strong>
                            <span class="text-gray-800">{{ auth()->user()->email }}</span>
                        </li>
                        <li class="flex justify-between">
                            <strong class="text-gray-600">Level:</strong>
                            <span class="text-gray-800">{{ auth()->user()->level }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>

    @include('sweetalert::alert')
</body>

</html>
