<div class="flex">
    <aside id="sidebar"
        class="font-poppins fixed inset-y-0 my-6 ml-4 w-full max-w-72 md:max-w-60 xl:max-w-64 2xl:max-w-64 z-50 rounded-3xl bg-white shadow-2xl overflow-y-scroll transform transition-transform duration-300 -translate-x-full md:translate-x-0 ease-in-out">
        <div class="p-2">
            <div class="p-4">
                <a class="" href="{{ route('dashboard') }}">
                    <div class="text-center mx-auto">
                        <img class="text-center mx-auto h-fit w-16" src="{{ asset('assets/img/logo.png') }}" alt="">
                    </div>
                    <div>
                        <h1 class="font-extrabold text-base text-center text-black">PT.Parcelinpack</h1>
                        <h1 class="font-extrabold text-base text-center text-black">Indonesia</h1>
                    </div>
                </a>
            </div>
            <hr class="mx-5 shadow-2xl bg-transparent rounded-r-xl rounded-l-xl" />
            <div>
                <ul class="">
                    <li class="p-4 mx-2">
                        <a class="" href="{{ route('dashboard') }}">
                            <div class="flex space-x-4">
                                <div class="bg-amber-600 p-2 rounded-xl">
                                    <i class="material-icons">home</i>
                                </div>
                                <div class="my-auto">
                                    <h1 class="text-gray-500 hover:text-black text-base font-normal">Dashboard</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="p-4 mx-2">
                        <div class="flex space-x-4">
                            <div class="bg-amber-600 p-2 rounded-xl">
                                <i class="material-icons">settings</i>
                            </div>
                            <div class="my-auto">
                                <h1 class="text-black text-base font-normal">Portfolio</h1>
                            </div>
                        </div>
                    </li>
                    <hr class="mx-5 shadow-2xl bg-transparent rounded-r-xl rounded-l-xl" />
                    <li class="p-4 mx-2">
                        <div class="ml-16 md:ml-14">
                            <a href="">
                                <h1 class="text-gray-500 hover:text-black text-base font-normal">Projects</h1>
                            </a>
                        </div>
                    </li>
                    <li class="p-4 mx-2">
                        <div class="flex space-x-4">
                            <div class="bg-amber-600 p-2 rounded-xl">
                                <i class="material-icons">settings</i>
                            </div>
                            <div class="my-auto">
                                <h1 class="text-black text-base font-normal">Layanan</h1>
                            </div>
                        </div>
                    </li>
                    <hr class="mx-5 shadow-2xl bg-transparent rounded-r-xl rounded-l-xl" />
                    <li class="p-4 mx-2">
                        <div class="ml-16 md:ml-14">
                            <a href="{{ route('kategori') }}">
                                <h1 class="text-gray-500 hover:text-black text-base font-normal">Kategori</h1>
                            </a>
                        </div>
                    </li>
                    <li class="p-4 mx-2">
                        <div class="ml-16 md:ml-14">
                            <a href="{{ route('tag') }}">
                                <h1 class="text-gray-500 hover:text-black text-base font-normal">Tag</h1>
                            </a>
                        </div>
                    </li>
                    <li class="p-4 mx-2">
                        <div class="ml-16 md:ml-14">
                            <a href="">
                                <h1 class="text-gray-500 hover:text-black text-base font-normal">Produk</h1>
                            </a>
                        </div>
                    </li>
                    <li class="p-4 mx-2">
                        <div class="flex space-x-4">
                            <div class="bg-amber-600 p-2 rounded-xl">
                                <i class="material-icons">settings</i>
                            </div>
                            <div class="my-auto">
                                <h1 class="text-black text-base font-normal">Settings</h1>
                            </div>
                        </div>
                    </li>
                    <hr class="mx-5 shadow-2xl bg-transparent rounded-r-xl rounded-l-xl" />
                    @if (auth()->user()->level == 'Admin')
                        <li class="p-4 mx-2">
                            <div class="ml-16 md:ml-14">
                                <a href="{{ route('user') }}">
                                    <h1 class="text-gray-500 hover:text-black text-base font-normal">User</h1>
                                </a>
                            </div>
                        </li>
                    @endif
                    <li class="p-4 mx-2">
                        <div class="ml-16 md:ml-14">
                            <a href="https://custompedia.agency/" target="blank">
                                <h1 class="text-gray-500 hover:text-black text-base font-normal">Website</h1>
                            </a>
                        </div>
                    </li>
                    <hr class="mx-5 shadow-2xl bg-transparent rounded-r-xl rounded-l-xl" />
                    <li class="p-4 mx-2">
                        <a href="{{ route('logout') }}">
                            <div class="flex space-x-4">
                                <div class="bg-amber-600 p-2 rounded-xl">
                                    <i class="material-icons rotate-180 font-extrabold">logout</i>
                                </div>
                                <div class="my-auto">
                                    <h1 class="text-gray-500 hover:text-black text-base font-normal">Logout</h1>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
</div>