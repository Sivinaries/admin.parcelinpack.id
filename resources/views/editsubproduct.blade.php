<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Sub Product</title>
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

            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Edit Sub Product</h1>
                </div>

                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updatesubproduct', ['id' => $subproduct->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <!-- Nama Product -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Product:</label>
                            <select id="product_id" name="product_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('product_id') border-red-500 @enderror" required>
                                <option value="" disabled selected>Pilih Produk</option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}" {{ old('product_id', $subproduct->product_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->product }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="grid grid-cols-3 gap-4">
                            <!-- Nama Sub Product -->
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama Sub Product:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('subproduct') border-red-500 @enderror"
                                    id="subproduct" name="subproduct" value="{{ old('subproduct', $subproduct->subproduct) }}" required>
                            </div>
                            <!-- Harga -->
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Price:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('price') border-red-500 @enderror"
                                    id="price" name="price" value="{{ old('price', $subproduct->price) }}" required>
                            </div>
                            <!-- Minimum Order -->
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Min:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('min') border-red-500 @enderror"
                                    id="min" name="min" value="{{ old('min', $subproduct->min) }}" required>
                            </div>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="grid grid-cols-3 gap-4">
                            @foreach ([1, 2, 3] as $num)
                                <div class="space-y-2">
                                    <label class="font-semibold text-black">Gambar {{ $num }}:</label>
                                    <img src="{{ asset('storage/' . $subproduct->{'img' . $num}) }}" alt="Gambar {{ $num }}" class="w-64 h-44 mx-auto">
                                    <input type="file"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('img' . $num) border-red-500 @enderror"
                                        id="img{{ $num }}" name="img{{ $num }}">
                                </div>
                            @endforeach
                        </div>

                        <!-- Deskripsi -->
                        @foreach ([1, 2, 3] as $num)
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description {{ $num }}:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44 @error('desc' . $num) border-red-500 @enderror"
                                    name="desc{{ $num }}" id="desc{{ $num }}" required>{{ old('desc' . $num, $subproduct->{'desc' . $num}) }}</textarea>
                            </div>
                        @endforeach

                        <button type="submit" class="bg-blue-500 text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
