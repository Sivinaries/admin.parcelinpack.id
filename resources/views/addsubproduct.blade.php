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
                    <form class="space-y-3" method="post" action="{{ route('createsubproduct') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama Product:</label>
                            <select id="product_id" name="product_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" required>
                                <option></option>
                                @foreach ($product as $item)
                                    <option value="{{ $item->id }}">{{ $item->product }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Nama Sub Product:</label>
                                <input type="text"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="subproduct" name="subproduct" placeholder="Sub Product" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Price:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="price" name="price" placeholder="1.XX.XXX" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Min:</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="min" name="min" placeholder="1XX" required>
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-4">
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 1:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img1" name="img1" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 2:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img2" name="img2" required>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Gambar 3:</label>
                                <input type="file"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                    id="img3" name="img3" required>
                            </div>

                        </div>
                        <div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description 1:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                    name="desc1" id="desc1">
                            </textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description 2:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                    name="desc2" id="desc2">
                            </textarea>
                            </div>
                            <div class="space-y-2">
                                <label class="font-semibold text-black">Description 3:</label>
                                <textarea class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full h-44" type='text'
                                    name="desc3" id="desc3">
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
