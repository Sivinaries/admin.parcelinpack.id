<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Project</title>
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

            <!-- Global Error Handling -->
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

            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Edit Project</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updateproject', ['id' => $project->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Nama Project -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Project:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('project') border-red-500 @enderror"
                                id="project" name="project" placeholder="Nama Project"
                                value="{{ old('project', $project->project) }}" required>
                        </div>

                        <!-- Gambar 1 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar 1:</label>
                            <img src="{{ asset('storage/' . $project->img1) }}" alt="Gambar 1" class="w-64 h-44 mx-auto">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('img1') border-red-500 @enderror"
                                id="img1" name="img1">
                        </div>

                        <!-- Gambar 2 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar 2:</label>
                            <img src="{{ asset('storage/' . $project->img2) }}" alt="Gambar 2" class="w-64 h-44 mx-auto">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('img2') border-red-500 @enderror"
                                id="img2" name="img2">
                        </div>

                        <!-- Deskripsi 1 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Deskripsi 1:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc1') border-red-500 @enderror"
                                name="desc1" id="desc1" required>{{ old('desc1', $project->desc1) }}</textarea>
                        </div>

                        <!-- Deskripsi 2 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Deskripsi 2:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc2') border-red-500 @enderror"
                                name="desc2" id="desc2" required>{{ old('desc2', $project->desc2) }}</textarea>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
