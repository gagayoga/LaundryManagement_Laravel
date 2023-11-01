@extends('layouts.app')

@section('contents')
    <div class="p-4 sm:ml-64">

        <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-20">

            <div class="mb-4">
                <nav class="flex mb-5" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                        <li class="inline-flex items-center">
                            <a href="{{ route('dashboard') }}"
                                class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                                <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                    </path>
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500"
                                    aria-current="page">Outlet</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            {{-- Bagian Captio atau judul form --}}
            <div>
                <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <p class="text-2xl font-semibold"> Data Outlet</p>
                    <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Manage all your existing
                        outlets or add a new one</p>
                </caption>
            </div>
            {{-- End bagian captiomn --}}

            {{-- Bagian button tambah data --}}
            <div class="flex items-center justify-left gap-3 block sm:flex md:flex md:divide-gray-100 dark:divide-gray-700">
                <button type="button" data-modal-target="CreateDataOutlet" data-modal-toggle="CreateDataOutlet"
                    class="inline-flex items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 2.5C10.1211 2.5 8.28435 3.05717 6.72209 4.10104C5.15982 5.14491 3.94218 6.62861 3.22315 8.36451C2.50412 10.1004 2.31598 12.0105 2.68254 13.8534C3.0491 15.6962 3.95389 17.3889 5.28249 18.7175C6.61109 20.0461 8.30383 20.9509 10.1466 21.3175C11.9895 21.684 13.8996 21.4959 15.6355 20.7769C17.3714 20.0578 18.8551 18.8402 19.899 17.2779C20.9428 15.7157 21.5 13.8789 21.5 12C21.4971 9.48134 20.4953 7.06667 18.7143 5.2857C16.9333 3.50474 14.5187 2.50291 12 2.5ZM16.242 13H13V16.242C13 16.5072 12.8946 16.7616 12.7071 16.9491C12.5196 17.1366 12.2652 17.242 12 17.242C11.7348 17.242 11.4804 17.1366 11.2929 16.9491C11.1054 16.7616 11 16.5072 11 16.242V13H7.758C7.49279 13 7.23843 12.8946 7.0509 12.7071C6.86336 12.5196 6.758 12.2652 6.758 12C6.758 11.7348 6.86336 11.4804 7.0509 11.2929C7.23843 11.1054 7.49279 11 7.758 11H11V7.758C11 7.49278 11.1054 7.23843 11.2929 7.05089C11.4804 6.86336 11.7348 6.758 12 6.758C12.2652 6.758 12.5196 6.86336 12.7071 7.05089C12.8946 7.23843 13 7.49278 13 7.758V11H16.242C16.5072 11 16.7616 11.1054 16.9491 11.2929C17.1366 11.4804 17.242 11.7348 17.242 12C17.242 12.2652 17.1366 12.5196 16.9491 12.7071C16.7616 12.8946 16.5072 13 16.242 13Z"
                            fill="#FFFFFF" />
                    </svg>
                    Create Outlet
                </button>


                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex px-4 py-2.5 text-center inline-flex items-center"
                    type="button">Filter <svg class="w-2 h ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="{{ route('outlet') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua
                                Data</a>
                        </li>
                        <li>
                            <a href="{{ route('outlet.terbaru') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Data
                                Terbaru</a>
                        </li>
                    </ul>
                </div>

            </div>
            {{-- end bagian button tambah --}}

            {{-- bagian search --}}
            <div class="mt-7">

                <form class="flex items-center" action="{{ route('outlet.cari') }}" method="GET">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                            </svg>
                        </div>
                        <input type="text" id="simple-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari data outlet" name="query">
                    </div>
                    <button id="showAllButton" type="submit"
                        class="p-3 ml-2 text-sm text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg minline-flex">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </form>

            </div>
        </div>
    </div>
    {{-- end bagian search --}}

    {{-- Bagian Tabel User --}}
    <div class="flex flex-col sm:ml-64 mt-5">

        <div class="overflow-x-auto">

            <div class="inline-block min-w-full align-middle">

                <div class="overflow-hidden shadow ">

                    {{-- Bagian alert succes jika data berhasil di update atau di hapus --}}
                    @if (session('success'))
                        <div id="alert-3"
                            class="flex items-center p-4 mb-2 text-green-800 bg-green-100 dark:bg-gray-800 dark:text-green-400"
                            role="alert">
                            <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                            </svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium">
                                {{ session('success') }}
                            </div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"
                                data-dismiss-target="#alert-3" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    {{-- end bgaian alert --}}

                    {{-- Tabel User --}}
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col"
                                    class=" px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Nama Outlet
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Alamat Outlet
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Telepon Outlet
                                </th>
                                <th scope="col"
                                    class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @if ($outlets->isEmpty())
                                <tr>
                                    <td colspan="5" class="w-full">
                                        <div class="p-5 mb-4 text-sm text-center text-red-800 bg-red-100 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <span class="font-medium"> Data not found.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($outlets as $outlet)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                        <td
                                            class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M19.876 2.517C19.7896 2.36034 19.6627 2.22973 19.5086 2.1388C19.3546 2.04786 19.1789 1.99993 19 2H5C4.82283 1.99993 4.64883 2.04693 4.49579 2.13619C4.34275 2.22544 4.21617 2.35376 4.129 2.508C3.63 3.393 2 7.385 2 8.75C2.00044 9.1867 2.08926 9.6188 2.26112 10.0203C2.43298 10.4217 2.68432 10.7843 3 11.086V21C3 21.2652 3.10536 21.5196 3.29289 21.7071C3.48043 21.8946 3.73478 22 4 22H6C6.26522 22 6.51957 21.8946 6.70711 21.7071C6.89464 21.5196 7 21.2652 7 21V15H11V21C11 21.2652 11.1054 21.5196 11.2929 21.7071C11.4804 21.8946 11.7348 22 12 22H20C20.2652 22 20.5196 21.8946 20.7071 21.7071C20.8946 21.5196 21 21.2652 21 21V11.044C21.3104 10.747 21.5586 10.3912 21.7303 9.99738C21.9019 9.60356 21.9936 9.17956 22 8.75C22 7.467 20.374 3.42 19.876 2.517ZM17.5 16.7C17.5 16.9122 17.4157 17.1157 17.2657 17.2657C17.1157 17.4157 16.9122 17.5 16.7 17.5H14.3C14.0878 17.5 13.8843 17.4157 13.7343 17.2657C13.5843 17.1157 13.5 16.9122 13.5 16.7V14.3C13.5 14.0878 13.5843 13.8843 13.7343 13.7343C13.8843 13.5843 14.0878 13.5 14.3 13.5H16.7C16.9122 13.5 17.1157 13.5843 17.2657 13.7343C17.4157 13.8843 17.5 14.0878 17.5 14.3V16.7ZM18.75 10C18.4186 9.99947 18.101 9.8676 17.8667 9.6333C17.6324 9.39899 17.5005 9.08136 17.5 8.75C17.5 8.48478 17.3946 8.23043 17.2071 8.04289C17.0196 7.85536 16.7652 7.75 16.5 7.75C16.2348 7.75 15.9804 7.85536 15.7929 8.04289C15.6054 8.23043 15.5 8.48478 15.5 8.75C15.5 9.08152 15.3683 9.39946 15.1339 9.63388C14.8995 9.8683 14.5815 10 14.25 10C13.9185 10 13.6005 9.8683 13.3661 9.63388C13.1317 9.39946 13 9.08152 13 8.75C13 8.48478 12.8946 8.23043 12.7071 8.04289C12.5196 7.85536 12.2652 7.75 12 7.75C11.7348 7.75 11.4804 7.85536 11.2929 8.04289C11.1054 8.23043 11 8.48478 11 8.75C11 9.08152 10.8683 9.39946 10.6339 9.63388C10.3995 9.8683 10.0815 10 9.75 10C9.41848 10 9.10054 9.8683 8.86612 9.63388C8.6317 9.39946 8.5 9.08152 8.5 8.75C8.5 8.48478 8.39464 8.23043 8.20711 8.04289C8.01957 7.85536 7.76522 7.75 7.5 7.75C7.23478 7.75 6.98043 7.85536 6.79289 8.04289C6.60536 8.23043 6.5 8.48478 6.5 8.75C6.49947 9.08136 6.36761 9.39899 6.1333 9.6333C5.89899 9.8676 5.58136 9.99947 5.25 10C4.91977 9.99585 4.60423 9.86282 4.3707 9.6293C4.13718 9.39577 4.00415 9.08023 4 8.75C4.30575 7.10009 4.84129 5.5012 5.591 4H18.4C19.1406 5.50581 19.6786 7.10301 20 8.75C19.9795 9.07479 19.8412 9.38094 19.6111 9.61106C19.3809 9.84118 19.0748 9.97947 18.75 10Z"
                                                        fill="#2F2F38" />
                                                </svg>
                                                {{ $outlet->nama }}
                                            </div>
                                        </td>

                                        <td
                                            class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M12.0001 2C10.5416 1.99858 9.11051 2.39629 7.86191 3.15005C6.6133 3.9038 5.59476 4.98486 4.91664 6.27611C4.23852 7.56735 3.92667 9.01954 4.01488 10.4754C4.10308 11.9312 4.58799 13.3351 5.41705 14.535C5.45024 14.6002 5.49048 14.6616 5.53705 14.718L5.65705 14.864C5.76905 15.009 5.88405 15.149 5.98305 15.264L11.2281 21.638C11.3221 21.7515 11.4401 21.8428 11.5735 21.9054C11.707 21.968 11.8526 22.0003 12.0001 22C12.1479 22.0001 12.2939 21.9674 12.4275 21.9043C12.5612 21.8412 12.6792 21.7492 12.7731 21.635L17.8651 15.43C18.0713 15.2082 18.2643 14.9745 18.4431 14.73L18.5701 14.575C18.6184 14.5162 18.6594 14.4518 18.6921 14.383C19.4823 13.1763 19.9316 11.7785 19.9925 10.3374C20.0533 8.89624 19.7234 7.46549 19.0376 6.19653C18.3518 4.92758 17.3357 3.86763 16.0969 3.12889C14.858 2.39015 13.4425 2.00009 12.0001 2ZM12.0001 13C11.4067 13 10.8267 12.8241 10.3333 12.4944C9.83999 12.1648 9.45548 11.6962 9.22841 11.1481C9.00135 10.5999 8.94194 9.99668 9.0577 9.41473C9.17345 8.83279 9.45917 8.29824 9.87873 7.87868C10.2983 7.45913 10.8328 7.1734 11.4148 7.05765C11.9967 6.94189 12.5999 7.0013 13.1481 7.22837C13.6963 7.45543 14.1648 7.83995 14.4945 8.33329C14.8241 8.82664 15.0001 9.40666 15.0001 10C15.0001 10.7957 14.684 11.5587 14.1214 12.1213C13.5588 12.6839 12.7957 13 12.0001 13Z"
                                                        fill="#2F2F38" />
                                                </svg> {{ $outlet->alamat }}
                                            </div>
                                        </td>
                                        {{-- telepon --}}
                                        <td
                                            class="p-4 text-base font-normal text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center gap-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M21 16.446C20.9453 15.6889 20.6076 14.9803 20.054 14.461L18.654 13.061C18.0859 12.5185 17.3305 12.2158 16.545 12.2158C15.7595 12.2158 15.0041 12.5185 14.436 13.061L13.736 13.761C13.5517 13.9453 13.3017 14.0488 13.041 14.0488C12.7803 14.0488 12.5303 13.9453 12.346 13.761L10.246 11.661C10.062 11.4767 9.95867 11.2269 9.95867 10.9665C9.95867 10.7061 10.062 10.4563 10.246 10.272L10.946 9.57198C11.2231 9.29521 11.443 8.96653 11.5929 8.60474C11.7429 8.24294 11.8201 7.85513 11.8201 7.46348C11.8201 7.07182 11.7429 6.68401 11.5929 6.32222C11.443 5.96042 11.2231 5.63174 10.946 5.35498L9.546 3.95498C9.28107 3.65747 8.95619 3.41938 8.59271 3.25635C8.22923 3.09332 7.83537 3.00903 7.437 3.00903C7.03863 3.00903 6.64477 3.09332 6.28129 3.25635C5.9178 3.41938 5.59293 3.65747 5.328 3.95498C1.709 7.57398 2.328 12.184 7.08 16.934C9.785 19.639 12.45 21 14.912 21C15.8812 20.9797 16.8363 20.7632 17.7195 20.3636C18.6028 19.964 19.3959 19.3896 20.051 18.675C20.3605 18.3938 20.6056 18.0491 20.7694 17.6643C20.9332 17.2796 21.0119 16.864 21 16.446Z"
                                                        fill="#2F2F38" />
                                                </svg>
                                                <div class="pl-2 text-left">
                                                    <div class="text-base font-semibold">{{ $outlet->telepon }}</div>
                                                </div>
                                        </td>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            {{-- button update --}}
                                            <button type="button"
                                                data-modal-target="UpdateDataOutlet-{{ $outlet->id }}"
                                                data-modal-toggle="UpdateDataOutlet-{{ $outlet->id }}"
                                                class="inline-flex items-center px-4 py-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z">
                                                    </path>
                                                    <path fill-rule="evenodd"
                                                        d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Update
                                            </button>
                                            {{-- end button update --}}

                                            {{-- button delete --}}
                                            <button type="button"
                                                class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80"
                                                data-modal-target="ModalDelete-{{ $outlet->id }}"
                                                data-modal-toggle="ModalDelete-{{ $outlet->id }}">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd"
                                                        d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                        clip-rule="evenodd"></path>
                                                </svg>
                                                Delete
                                            </button>
                                            {{-- end button delete --}}
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
    {{-- end tabel pengguna --}}
@endsection

@section('modals')
    <!-- modal Delete data pengguna -->
    @foreach ($outlets as $outlet)
        <div id="ModalDelete-{{ $outlet->id }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="ModalDelete-{{ $outlet->id }}">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Apakah Anda yakin menghapus
                            data outlet ini? Anda dapat membatalkan.</h3>
                        <a type="submit" href="{{ route('outlet.hapus', $outlet->id) }}"
                            class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 mr-2">
                            Delete Data
                        </a>
                        <button data-modal-hide="ModalDelete-{{ $outlet->id }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal delete --}}


    {{-- modal create & update --}}
    @foreach ($outlets as $outlet)
        <div id="UpdateDataOutlet-{{ $outlet->id }}" tabindex="-1" data-modal-backdrop="static" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                    <!-- Modal header -->
                    <div
                        class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ isset($outlet) ? 'Update Data Outlet' : '' }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="UpdateDataOutlet-{{ $outlet->id }}"
                            data-modal-hide="UpdateDataOutlet-{{ $outlet->id }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <form action="{{ isset($outlet) ? route('outlet.tambah.update', $outlet->id) : '' }}" method="POST">
                        @csrf
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name
                                    Outlet</label>
                                <input type="text" name="nama"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="input name outlet" required
                                    value="{{ isset($outlet) ? $outlet->nama : '' }}">
                            </div>
                            <div>
                                <label for="brand"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat
                                    Outlet</label>
                                <input type="text" name="alamat"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="input alamat outlet" required
                                    value="{{ isset($outlet) ? $outlet->alamat : '' }}">
                            </div>
                            <div class="sm:col-span-2">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon
                                    Outlet</label>
                                <input type="text" name="telepon"
                                    class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="input no telepon" required
                                    value="{{ isset($outlet) ? $outlet->telepon : '' }}">
                            </div>
                        </div>
                        <div
                            class="flex items-center py-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button type="submit"
                                class="flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">{{ isset($outlet) ? 'Update Data' : 'Create Data' }}</button>

                            <button type="button" data-modal-hide="UpdateDataOutlet-{{ $outlet->id }}"
                                class="flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal --}}

    {{-- Modal create data --}}
    <!-- Main modal -->
    <div id="CreateDataOutlet" tabindex="-1" data-modal-backdrop="static" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                <!-- Modal header -->
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Create Data Outlet
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="CreateDataOutlet">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form action="{{ route('outlet.tambah.simpan') }}" method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name Outlet</label>
                            <input type="text" name="nama"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="input name outlet" required>
                        </div>
                        <div>
                            <label for="brand"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Outlet</label>
                            <input type="text" name="alamat"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="input alamat outlet" required>
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Telepon
                                Outlet</label>
                            <input type="text" name="telepon"
                                class="bg-gray-50 border w-full border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="input no telepon" required>
                        </div>
                    </div>
                    <div class="flex items-center py-4 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">Create
                            Data</button>

                        <button type="button" data-modal-hide="CreateDataOutlet"
                            class="flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end modal --}}
    {{-- end modal --}}
@endsection
