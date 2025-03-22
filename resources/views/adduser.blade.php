<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add User</title>
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
                    <h1 class="font-extrabold text-3xl">Add user</h1>
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

                    <form class="space-y-3" method="post" action="{{ route('createuser') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('post')

                        <!-- Nama -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Nama:</label>
                            <input type="text"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('name') border-red-500 @enderror"
                                id="name" name="name" placeholder="Nama" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Email:</label>
                            <input type="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('email') border-red-500 @enderror"
                                id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            @error('email')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Password:</label>
                            <input type="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('password') border-red-500 @enderror"
                                id="password" name="password" placeholder="Password" required>
                            @error('password')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Password Confirmation:</label>
                            <input type="password"
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full"
                                id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation" required>
                        </div>

                        <!-- Level -->
                        <div class="space-y-2">
                            <label class="font-semibold text-black">Level:</label>
                            <select
                                class="bg-gray-50 border border-gray-300 text-gray-900 p-2 rounded-lg w-full @error('level') border-red-500 @enderror"
                                id="level" name="level" required>
                                <option value="Admin" {{ old('level') == 'Admin' ? 'selected' : '' }}>Admin</option>
                                <option value="Writer" {{ old('level') == 'Writer' ? 'selected' : '' }}>Writer</option>
                            </select>
                            @error('level')
                                <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
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
