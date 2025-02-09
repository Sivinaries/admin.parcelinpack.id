<!DOCTYPE html>
<html lang="en">

<head>
    <title>Profil</title>
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
        <div class="p-6">
            <div class=''>
                <div class="">
                    <span class="bg-blue-500"></span>
                </div>
                <div
                    class="">
                    <div class="">
                        <div class="my-auto">
                            <div class="flex space-x-2">
                                <div>
                                    <img class="w-10 h-fit" src="{{ asset('assets/img/logo.png') }}" alt="">
                                </div>
                                <div class="my-auto">
                                    <h1 class="">{{ auth()->user()->name }}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full max-w-full px-3 p-6 mx-auto">
                    <div
                        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-3xl bg-clip-border">
                        <div class="p-4 pb-0 mb-0 bg-white border-b-0 rounded-3xl">
                            <div class="flex items-center w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-none">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                        </div>
                        <div class="flex-auto p-4">
                            <hr
                                class="h-px bg-transparent bg-gradient-to-r from-transparent via-white to-transparent" />
                            <ul class="flex flex-col pl-0 mb-0 rounded-3xl">
                                <li
                                    class="relative block px-4 py-2 pt-0 pl-0 leading-normal bg-white border-0 rounded-3xl text-sm text-inherit">
                                    <strong class="text-slate-700">Name:</strong> &nbsp; {{ auth()->user()->name }}
                                </li>
                                <li
                                    class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                    <strong class="text-slate-700">Email:</strong> &nbsp; {{ auth()->user()->email }}
                                </li>
                                <li
                                    class="relative block px-4 py-2 pl-0 leading-normal bg-white border-0 border-t-0 text-sm text-inherit">
                                    <strong class="text-slate-700">Level:</strong> &nbsp; {{ auth()->user()->level }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('sweetalert::alert')
</body>
</html>
