<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Tag</title>
    @include('layout.head')
</head>

<body class="bg-gray-50">
    <!-- Sidenav -->
    @include('layout.left-side')
    <!-- End Sidenav -->

    <main class="md:ml-64 xl:ml-72 2xl:ml-72">
        <!-- Navbar -->
        @include('layout.navbar')
        <!-- End Navbar -->

        <div class="p-6">
            <!-- Error Handling -->
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

            <div class='w-full bg-white rounded-xl h-fit mx-auto shadow-md'>
                <div class="p-4 text-center">
                    <h1 class="font-extrabold text-3xl">Edit Tag</h1>
                </div>

                <div class="p-6">
                    <form class="space-y-4" method="post" action="{{ route('updatetag', ['id' => $tag->id]) }}">
                        @csrf
                        @method('put')

                        <!-- Input Nama Tag -->
                        <div class="space-y-2">
                            <label for="tag" class="font-semibold text-black">Nama Tag:</label>
                            <input type="text" id="tag" name="tag"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-3 rounded-lg w-full @error('tag') border-red-500 @enderror"
                                value="{{ old('tag', $tag->tag) }}" required>
                            @error('tag')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white p-4 w-full hover:bg-blue-600 hover:text-black rounded-lg transition">
                            Update Tag
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
