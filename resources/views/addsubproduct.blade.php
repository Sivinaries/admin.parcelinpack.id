<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add Sub Product</title>
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
                    <h1 class="font-extrabold text-3xl">Add subproduct</h1>
                </div>
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

                    <form class="space-y-3" method="post" action="{{ route('createsubproduct') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <!-- Nama Product -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Product:</label>
                            <select id="product_id" name="product_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" required>
                                <option></option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}" {{ old('product_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->product }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Grid Form -->
                        <div class="grid grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama Sub Product:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="subproduct" name="subproduct" placeholder="Sub Product"
                                    value="{{ old('subproduct') }}" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Price:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="price" name="price" placeholder="1.XX.XXX"
                                    value="{{ old('price') }}" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Min:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="min" name="min" placeholder="1XX"
                                    value="{{ old('min') }}" required>
                            </div>
                        </div>

                        <!-- Upload Gambar -->
                        <div class="grid grid-cols-3 gap-4">
                            @for ($i = 1; $i <= 3; $i++)
                                <div class="space-y-2">
                                    <label class="font-semibold text-black">Gambar {{ $i }}:</label>
                                    <input type="file"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                        id="img{{ $i }}" name="img{{ $i }}" required>
                                </div>
                            @endfor
                        </div>

                        <!-- Deskripsi -->
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description {{ $i }}:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44"
                                    name="desc{{ $i }}" id="desc{{ $i }}">{{ old('desc' . $i) }}</textarea>
                            </div>
                        @endfor

                        <button type="submit"
                            class="bg-blue-500 text-white p-4 w-full hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
