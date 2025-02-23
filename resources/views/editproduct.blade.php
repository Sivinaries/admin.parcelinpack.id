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
            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Edit product</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post" action="{{ route('updateproduct', ['id' => $product->id]) }}">
                        @csrf
                        @method('put')
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama kategori:</label>
                            <select id="kategori" name="kategori_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" required>
                            <option></option>
                            @foreach ($kategori as $cat)
                                <option value="{{ $cat->id }}" 
                                    {{ old('kategori_id', $product->kategori_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->kategori }}
                                </option>
                            @endforeach
                        </select>
                        
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama product:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="product" name="product" value="{{ $product->product }}" required>
                        </div>
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Description:</label>
                            <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                name="desc" id="desc" required>
                                {{ $product->desc }}
                            </textarea>
                        </div>

                        <button type="submit"
                            class="bg-blue-500 text-white p-2 w-fit hover:text-black rounded-lg">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
