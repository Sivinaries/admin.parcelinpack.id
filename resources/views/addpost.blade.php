<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Post</title>
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
                    <h1 class="font-extrabold text-3xl">Add post</h1>
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
                    <form class="space-y-3" method="post" action="{{ route('createpost') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Judul post:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="post" name="post" value="{{ old('post') }}" placeholder="Post" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar:</label>
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="img" name="img" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 1:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                name="desc1" id="desc1">
                                {{ old('desc1') }}

                            </textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 2:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                name="desc2" id="desc2">
                                {{ old('desc2') }}
                            </textarea>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 3:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                name="desc3" id="desc3">
                                {{ old('desc3') }}
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
