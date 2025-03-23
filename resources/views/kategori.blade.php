<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kategori</title>
    @include('layout.head')
    <link href="//cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css" rel="stylesheet" />
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
            <div class='w-full rounded-xl bg-white h-fit mx-auto'>
                <div class="p-3">
                    <div class="flex justify-between">
                        <h1 class="font-extrabold text-3xl">Category</h1>
                        <a class="p-2 bg-blue-500 rounded-xl text-white hover:text-black text-center px-10"
                            href="{{ route('addkategori') }}">Add
                            category</a>
                    </div>
                </div>
                <div class="p-2">
                    <div class="overflow-auto">
                        <table id="myTable" class="bg-gray-50 border-2">
                            <thead class="w-full">
                                <th>No</th>
                                <th>Date</th>
                                <th>Nama</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($kategori as $item)
                                    <tr class="border-2">
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{ $item->kategori }}</td>
                                        <td class="flex gap-2">
                                            <div class="p-2 px-10 w-full bg-blue-500 rounded-xl">
                                                <a href="{{ route('editkategori', ['id' => $item->id]) }}">
                                                    <h1 class=" text-white hover:text-black  text-center">
                                                        Edit</h1>
                                                </a>
                                            </div>
                                            @if (auth()->user()->level == 'Admin')
                                                <div class="p-2 px-10 w-full  rounded-xl black bg-red-500">
                                                    <form
                                                        class=" text-white hover:text- text-center"
                                                        method="post"
                                                        action="{{ route('destroykategori', ['id' => $item->id]) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit">Delete</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            let table = new DataTable('#myTable', {
                columnDefs: [{
                    targets: 1, // Index of the 'Date' column
                    render: function(data, type, row) {
                        // Assuming the date is in 'YYYY-MM-DD HH:MM:SS' format
                        var date = new Date(data);
                        return date.toLocaleDateString(); // Format the date as needed
                    },
                }, ],
            });
        });
    </script>
</body>
@include('sweetalert::alert')

</html>
