<!DOCTYPE html>
<html lang="en">

<head>
    <title>Set Tag</title>
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
                    <h1 class="font-extrabold text-3xl">Set tag</h1>
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

                    <form class="space-y-3" method="post" action="{{ route('createsubtag') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <!-- Sub Product -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Sub Product:</label>
                            <select id="subproduct" name="subproduct_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" required>
                                <option></option>
                                @foreach ($subproduct as $sub)
                                    <option value="{{ $sub->id }}" {{ old('subproduct_id') == $sub->id ? 'selected' : '' }}>
                                        {{ $sub->subproduct }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tag -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Tag:</label>
                            <select id="tag" name="tag_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full" required>
                                <option></option>
                                @foreach ($tag as $ta)
                                    <option value="{{ $ta->id }}" {{ old('tag_id') == $ta->id ? 'selected' : '' }}>
                                        {{ $ta->tag }}
                                    </option>
                                @endforeach
                            </select>
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
