<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Sub Product</title>
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
                    <h1 class="font-extrabold text-3xl">Edit subproduct</h1>
                </div>
                <div class="p-6">
                    <form class="space-y-3" method="post"
                        action="{{ route('updatesubproduct', ['id' => $subproduct->id]) }}"
                        enctype="multipart/form-data"
                        >
                        @csrf
                        @method('put')
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Product:</label>
                            <select id="product_id" name="product_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" >
                                <option></option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('product_id', $subproduct->product_id) == $item->id ? 'selected' : '' }}>
                                        {{ $item->product }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama Sub Product:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="subproduct" name="subproduct" value="{{ $subproduct->subproduct }}" >
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Price:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="price" name="price" value="{{ $subproduct->price }}" >
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Min:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="min" name="min" value="{{ $subproduct->min }}" >
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 1:</label>
                                <img src="{{ asset('storage/' . $subproduct->img1) }}" alt="Gambar 1" class="w-64 h-44 mx-auto ">
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img1" name="img1">
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 2:</label>
                                <img src="{{ asset('storage/' . $subproduct->img2) }}" alt="Gambar 2" class="w-64 h-44 mx-auto ">
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img2" name="img2">
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 3:</label>
                                <img src="{{ asset('storage/' . $subproduct->img3) }}" alt="Gambar 3" class="w-64 h-44 mx-auto ">
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img3" name="img3">
                            </div>

                        </div>
                        <div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description 1:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                    name="desc1" id="desc1">
                                    {{ $subproduct->desc1 }}
                            </textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description 2:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                    name="desc2" id="desc2">
                                    {{ $subproduct->desc2 }}
                            </textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description 3:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                    name="desc3" id="desc3">
                                    {{ $subproduct->desc3 }}
                            </textarea>
                            </div>
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
