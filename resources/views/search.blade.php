<!DOCTYPE html>
<html lang="en">

<head>
    <title>Search Result</title>
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
            <div class='w-full bg-white rounded-xl h-fit mx-auto'>
                <div class="p-3 text-center">
                    <h1 class="font-extrabold text-3xl">Search Result</h1>
                </div>
                <div class="p-6">
                    <div class="space-y-8">
                        <div class="space-y-2">
                            <div>
                                <h1 class="font-extrabold text-3xl">Projects</h1>
                            </div>
                            <div>
                                <div class="p-2">
                                    <div class="overflow-auto">
                                        <table id="proTable" class="bg-gray-50 border-2">
                                            <thead class="w-full">
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Project</th>
                                                <th>Desc</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($proResults as $item)
                                                    <tr class="border-2">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->project }}</td>
                                                        <td>{{ $item->desc1 }}</td>
                                                        <td class="flex gap-2">
                                                            <div class="p-2 px-10 w-full bg-blue-500 rounded-xl">
                                                                <a
                                                                    href="{{ route('editproject', ['id' => $item->id]) }}">
                                                                    <h1
                                                                        class=" text-white hover:text-black  text-center">
                                                                        Edit</h1>
                                                                </a>
                                                            </div>
                                                            @if (auth()->user()->level == 'Admin')
                                                                <div
                                                                    class="p-2 px-10 w-full  rounded-xl black bg-red-500">
                                                                    <form class=" text-white hover:text- text-center"
                                                                        method="post"
                                                                        action="{{ route('destroyproject', ['id' => $item->id]) }}">
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
                        <div class="space-y-2">
                            <div>
                                <h1 class="font-extrabold text-3xl">Sub Product</h1>
                            </div>
                            <div>
                                <div class="p-2">
                                    <div class="overflow-auto">
                                        <table id="subTable" class="bg-gray-50 border-2">
                                            <thead class="w-full">
                                                <th>No</th>
                                                <th>Date</th>
                                                <th>Product</th>
                                                <th>Name</th>
                                                <th>Min</th>
                                                <th>Price</th>
                                                <th>Tag</th>
                                                <th>Action</th>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($subResults as $item)
                                                    <tr class="border-2">
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>{{ $item->product?->product }}</td>
                                                        <td>{{ $item->subproduct }}</td>
                                                        <td>{{ $item->min }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>
                                                            @foreach ($item->tags as $tag)
                                                                <span
                                                                    class="bg-gray-200 text-black p-2">{{ $tag->tag }}</span>
                                                            @endforeach
                                                        </td>
                                                        <td class="flex gap-2">
                                                            <div class="p-2 px-10 w-full bg-blue-500 rounded-xl">
                                                                <a
                                                                    href="{{ route('editsubproduct', ['id' => $item->id]) }}">
                                                                    <h1
                                                                        class=" text-white hover:text-black  text-center">
                                                                        Edit</h1>
                                                                </a>
                                                            </div>
                                                            @if (auth()->user()->level == 'Admin')
                                                                <div
                                                                    class="p-2 px-10 w-full  rounded-xl black bg-red-500">
                                                                    <form class=" text-white hover:text- text-center"
                                                                        method="post"
                                                                        action="{{ route('destroysubproduct', ['id' => $item->id]) }}">
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
            let table = new DataTable('#subTable', {
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
        $(document).ready(function() {
            let table = new DataTable('#proTable', {
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
        $(document).ready(function() {
            let table = new DataTable('#Tableuser', {
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

</html>
