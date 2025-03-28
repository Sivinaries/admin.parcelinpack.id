<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Post</title>
    @include('layout.head')
    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
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
                    <h1 class="font-extrabold text-3xl">Edit Post</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post"
                        action="{{ route('updatepost', ['id' => $post->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Judul Post -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Judul post:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('post') border-red-500 @enderror"
                                id="post" name="post" value="{{ old('post', $post->post) }}" required>
                        </div>

                        <!-- Gambar -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar:</label>
                            <img src="{{ asset('storage/' . $post->img) }}" alt="Gambar" class="w-64 h-44 mx-auto">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('img') border-red-500 @enderror"
                                id="img" name="img">
                        </div>

                        <!-- Description 1 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 1:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc1') border-red-500 @enderror"
                                name="desc1" id="desc1">{{ old('desc1', $post->desc1) }}</textarea>
                        </div>

                        <!-- Description 2 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 2:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc2') border-red-500 @enderror"
                                name="desc2" id="desc2">{{ old('desc2', $post->desc2) }}</textarea>
                        </div>

                        <!-- Description 3 -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description 3:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc3') border-red-500 @enderror"
                                name="desc3" id="desc3">{{ old('desc3', $post->desc3) }}</textarea>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

<script>
    CKEDITOR.replace('desc1');
    CKEDITOR.replace('desc2');
    CKEDITOR.replace('desc3');
</script>

</html>
