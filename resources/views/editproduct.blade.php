<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Product</title>
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
                    <h1 class="font-extrabold text-3xl">Edit Product</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updateproduct', ['id' => $product->id]) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Nama Kategori -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Kategori:</label>
                            <select id="kategori" name="kategori_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('kategori_id') border-red-500 @enderror"
                                required>
                                <option value="">Pilih kategori</option>
                                @foreach ($kategori as $cat)
                                    <option value="{{ $cat->id }}" 
                                        {{ old('kategori_id', $product->kategori_id) == $cat->id ? 'selected' : '' }}>
                                        {{ $cat->kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Nama Produk -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Produk:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('product') border-red-500 @enderror"
                                id="product" name="product" value="{{ old('product', $product->product) }}" required>
                        </div>

                        <!-- Gambar -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Gambar:</label>
                            <img src="{{ asset('storage/' . $product->img) }}" alt="Gambar" class="w-64 h-44 mx-auto">
                            <input type="file"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('img') border-red-500 @enderror"
                                id="img" name="img">
                        </div>

                        <!-- Deskripsi -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Deskripsi:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc') border-red-500 @enderror"
                                name="desc" id="desc" required>{{ old('desc', $product->desc) }}</textarea>
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
