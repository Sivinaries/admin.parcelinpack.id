<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Project</title>
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
            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Add project</h1>
                </div>
                <div class="p-6">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                            <strong>Error!</strong> Ada beberapa masalah dengan input Anda:
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="space-y-3" method="post" action="{{ route('createproject') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama project:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="project" name="project" value="{{ old('project') }}" placeholder="Project"
                                required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 1:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img1" name="img1" required>
                            </div>

                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 2:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img2" name="img2" required>
                            </div>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 1:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" name="desc1"
                                id="desc1">{{ old('desc1') }}</textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 2:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" name="desc2"
                                id="desc2">{{ old('desc2') }}</textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 text-white p-4 w-full hover:text-black rounded-lg">
                            Submit
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </main>
</body>

</html>
