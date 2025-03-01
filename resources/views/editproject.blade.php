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
            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Edit project</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updateproject', ['id' => $project->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama project:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="project" name="project" placeholder="Project" value="{{ $project->project }}">
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar 1:</label>
                            <img src="{{ asset('storage/' . $project->img1) }}" alt="Gambar" class="w-64 h-44 mx-auto ">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="img1" name="img1">
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar 2:</label>
                            <img src="{{ asset('storage/' . $project->img2) }}" alt="Gambar" class="w-64 h-44 mx-auto ">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="img2" name="img2">
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                name="desc1" id="desc1">
                                {{ $project->desc1 }}

                            </textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                name="desc2" id="desc2">
                                {{ $project->desc2 }}

                            </textarea>
                        </div>
                        <button type="submit"
                            class="bg-blue-500  text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
