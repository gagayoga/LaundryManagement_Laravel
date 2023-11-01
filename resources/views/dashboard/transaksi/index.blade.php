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
                                    aria-current="page">Transaksi</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            {{-- Bagian Captio atau judul form --}}
            <div class="mt-5">
                <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <p class="text-2xl font-semibold">Data Transaksi</p>
                    <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Manage all your existing
                        transaksis or add a new one</p>
                </caption>
            </div>
            {{-- End bagian captiomn --}}

            {{-- Bagian button tambah data --}}
            <div class="flex items-center justify-left gap-3 block sm:flex md:flex md:divide-gray-100 dark:divide-gray-700">
                <a type="button" href="{{ route('transaksi.tambah') }}"
                    class="inline-flex items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 2.5C10.1211 2.5 8.28435 3.05717 6.72209 4.10104C5.15982 5.14491 3.94218 6.62861 3.22315 8.36451C2.50412 10.1004 2.31598 12.0105 2.68254 13.8534C3.0491 15.6962 3.95389 17.3889 5.28249 18.7175C6.61109 20.0461 8.30383 20.9509 10.1466 21.3175C11.9895 21.684 13.8996 21.4959 15.6355 20.7769C17.3714 20.0578 18.8551 18.8402 19.899 17.2779C20.9428 15.7157 21.5 13.8789 21.5 12C21.4971 9.48134 20.4953 7.06667 18.7143 5.2857C16.9333 3.50474 14.5187 2.50291 12 2.5ZM16.242 13H13V16.242C13 16.5072 12.8946 16.7616 12.7071 16.9491C12.5196 17.1366 12.2652 17.242 12 17.242C11.7348 17.242 11.4804 17.1366 11.2929 16.9491C11.1054 16.7616 11 16.5072 11 16.242V13H7.758C7.49279 13 7.23843 12.8946 7.0509 12.7071C6.86336 12.5196 6.758 12.2652 6.758 12C6.758 11.7348 6.86336 11.4804 7.0509 11.2929C7.23843 11.1054 7.49279 11 7.758 11H11V7.758C11 7.49278 11.1054 7.23843 11.2929 7.05089C11.4804 6.86336 11.7348 6.758 12 6.758C12.2652 6.758 12.5196 6.86336 12.7071 7.05089C12.8946 7.23843 13 7.49278 13 7.758V11H16.242C16.5072 11 16.7616 11.1054 16.9491 11.2929C17.1366 11.4804 17.242 11.7348 17.242 12C17.242 12.2652 17.1366 12.5196 16.9491 12.7071C16.7616 12.8946 16.5072 13 16.242 13Z"
                            fill="#FFFFFF" />
                    </svg>
                    Create Transaksi
                </a>


                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex px-5 py-2.5 text-center inline-flex items-center"
                    type="button">Filter <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="{{ route('transaksi') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reset
                                Data</a>
                        </li>
                        <li>
                            <a href="{{ route('transaksi.semua') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua
                                Data</a>
                        </li>
                        <li>
                            <a href="{{ route('transaksi.terbaru') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Data
                                Terbaru</a>
                        </li>
                    </ul>
                </div>

            </div>
            {{-- end bagian button tambah --}}

            {{-- bagian search --}}
            <div class="mt-8 mb-3">

                <form class="flex items-center" action="{{ route('transaksi.cari') }}" method="GET">
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
                            placeholder="Cari data transaksi" name="query">
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

    {{-- Bagian Tabel User --}}
    <div class="flex flex-col sm:ml-64 mt-3">

        <div class="overflow-x-auto">

            <div class="inline-block min-w-full shadow-md sm:rounded-lg align-middle">

                <div class="overflow-x-auto">
                    {{-- Bagian alert succes jika data berhasil di update atau di hapus --}}

                    @if (session('success'))
                        <div id="alert-3"
                            class="flex items-center p-4 mb-4 text-green-800 bg-green-100 dark:bg-gray-800 dark:text-green-400"
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
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Kode Transaksi
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Nama Outlet
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Nama Member
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Tanggal Transaksi
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Tanggal Bayar
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Status
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Status Bayar
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    User
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @if ($transaksis->isEmpty())
                                <tr>
                                    <td colspan="13" class="w-full">
                                        <div class="p-5 mb-4 text-sm text-center text-red-800 bg-red-100 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <span class="font-medium"> Data not found.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($transaksis as $transaksi)
                                    <tr>
                                        <td
                                            class="max-w-sm p-6 overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                            {{ $transaksi->kode_invoice }}
                                        </td>
                                        <th scope="row"
                                            class="items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="pl-4 mr-2 text-left">
                                                <div class="text-base font-semibold">{{ $transaksi->outlet->nama }}
                                                </div>
                                                <div class="font-normal text-gray-500">{{ $transaksi->outlet->alamat }}
                                                </div>
                                            </div>
                                        </th>
                                        <td
                                                class="flex items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">
                                                        {{ $transaksi->member->nama }}</div>
                                                    @if ($transaksi->member->status === 'Member')
                                                        <div class="flex items-center justify-center ">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 11 10" fill="none">
                                                                <g clip-path="url(#clip0_278_67)">
                                                                    <path
                                                                        d="M8.82996 4.11607L8.45579 3.74149C8.37663 3.66274 8.33329 3.55774 8.33329 3.44649V2.91649C8.33329 2.22732 7.77246 1.66649 7.08329 1.66649H6.55329C6.44371 1.66649 6.33621 1.62191 6.25871 1.54441L5.88413 1.16982C5.39663 0.682324 4.60413 0.682324 4.11663 1.16982L3.74121 1.54441C3.66371 1.62191 3.55621 1.66649 3.44663 1.66649H2.91663C2.22746 1.66649 1.66663 2.22732 1.66663 2.91649V3.44649C1.66663 3.55774 1.62329 3.66274 1.54454 3.74149L1.16996 4.11566C0.933711 4.35191 0.803711 4.66607 0.803711 4.99982C0.803711 5.33357 0.934128 5.64774 1.16996 5.88357L1.54413 6.25816C1.62329 6.33691 1.66663 6.44191 1.66663 6.55316V7.08316C1.66663 7.77232 2.22746 8.33316 2.91663 8.33316H3.44663C3.55621 8.33316 3.66371 8.37774 3.74121 8.45524L4.11579 8.83024C4.35954 9.07357 4.67954 9.19524 4.99954 9.19524C5.31954 9.19524 5.63954 9.07357 5.88329 8.82982L6.25788 8.45524C6.33621 8.37774 6.44371 8.33316 6.55329 8.33316H7.08329C7.77246 8.33316 8.33329 7.77232 8.33329 7.08316V6.55316C8.33329 6.44191 8.37663 6.33691 8.45579 6.25816L8.82996 5.88399C9.06579 5.64774 9.19621 5.33399 9.19621 4.99982C9.19621 4.66566 9.06621 4.35191 8.82996 4.11607ZM6.89788 4.51316L4.39788 6.17982C4.32746 6.22691 4.24663 6.24982 4.16663 6.24982C4.05913 6.24982 3.95246 6.20816 3.87204 6.12774L3.03871 5.29441C2.87579 5.13149 2.87579 4.86816 3.03871 4.70524C3.20163 4.54232 3.46496 4.54232 3.62788 4.70524L4.21954 5.29691L6.43538 3.81982C6.62746 3.69191 6.88579 3.74357 7.01329 3.93524C7.14121 4.12691 7.08954 4.38566 6.89788 4.51316Z"
                                                                        fill="#007FFF" />
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_278_67">
                                                                        <rect width="10" height="10"
                                                                            fill="white" />
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            <div class="font-normal text-gray-500">
                                                                {{ $transaksi->member->status }}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center justify-center">
                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                                            <div class="font-normal text-gray-500">
                                                                {{ $transaksi->member->status }}
                                                            </div>
                                                    @endif
                                            </td>
                                        <td
                                            class="max-w-sm p-6 overflow-hidden text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                            {{ $transaksi->tanggal }}
                                        </td>
                                        <td
                                            class="max-w-sm p-6 overflow-hidden text-center text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                            {{ $transaksi->tanggal_bayar }}
                                        </td>
                                        @if ($transaksi->status === 'Pending')
                                            <td>
                                                <span
                                                    class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">{{ $transaksi->status }}</span>
                                            </td>
                                        @elseif ($transaksi->status === 'Proses')
                                            <td>
                                                <span
                                                    class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-yellow-100 dark:bg-gray-700 dark:border-yellow-500 dark:text-purple-400">{{ $transaksi->status }}</span>
                                            </td>
                                        @else
                                            <td>
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">{{ $transaksi->status }}</span>
                                            </td>
                                        @endif

                                        @if ($transaksi->status_bayar === 'Dibayar')
                                            <td>
                                                <span
                                                    class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">{{ $transaksi->status_bayar }}</span>
                                            </td>
                                        @else
                                            <td>
                                                <span
                                                    class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">{{ $transaksi->status_bayar }}</span>
                                            </td>
                                        @endif
                                        <th scope="row"
                                            class="flex items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="pl-4 mr-2 text-left">
                                                <div class="text-base font-semibold">{{ $transaksi->user->nama }}
                                                </div>
                                                <div class="font-normal text-gray-500">{{ $transaksi->user->role }}
                                                </div>
                                            </div>
                                        </th>
                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            {{-- button update --}}
                                            <a type="button" href="{{ route('transaksi.edit', $transaksi->id) }}"
                                                class="inline-flex items-center px-3 py-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
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
                                            </a>
                                            {{-- end button update --}}

                                            {{-- button update --}}
                                            <a type="button" data-modal-target="ModalPreview-{{ $transaksi->id }}"
                                                data-modal-toggle="ModalPreview-{{ $transaksi->id }}"
                                                class="inline-flex items-center px-4 py-2 text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 font-medium rounded-lg text-s minline-flex">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 20"
                                                    fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                    <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                </svg>
                                                Preview
                                            </a>
                                            {{-- end button update --}}

                                            {{-- button delete --}}
                                            <button type="button"
                                                class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80"
                                                data-modal-target="ModalDelete-{{ $transaksi->id }}"
                                                data-modal-toggle="ModalDelete-{{ $transaksi->id }}">
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
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div
            class="sticky bottom-0 right-0 items-center w-full p-4 bg-white border-t border-gray-200 sm:flex sm:justify-between dark:bg-gray-800 dark:border-gray-700">
            <div class="flex items-center mb-4 sm:mb-0">
                <a href="#"
                    class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover-bg-gray-100 dark-hover-bg-gray-700 dark-hover-text-white">
                    <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="#"
                    class="inline-flex justify-center p-1 mr-2 text-gray-500 rounded cursor-pointer hover-text-gray-900 hover-bg-gray-100 dark-hover-bg-gray-700 dark-hover-text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none">
                        <path
                            d="M15.3863 10.5831L9.69743 5.25311C9.50296 5.0796 9.24851 4.98914 8.9884 5.00104C8.72829 5.01294 8.48312 5.12625 8.30523 5.31679C8.12733 5.50733 8.0308 5.76001 8.03624 6.02089C8.04168 6.28177 8.14866 6.53018 8.33434 6.71311L13.9633 11.9831L8.33434 17.2531C8.23491 17.3418 8.1542 17.4496 8.09696 17.57C8.03972 17.6904 8.00711 17.8211 8.00104 17.9544C7.99497 18.0877 8.01557 18.2208 8.06162 18.346C8.10768 18.4711 8.17826 18.5858 8.2692 18.6832C8.36015 18.7806 8.46963 18.8588 8.59119 18.9132C8.71275 18.9676 8.84394 18.997 8.97703 18.9998C9.11012 19.0026 9.24242 18.9786 9.36614 18.9294C9.48986 18.8802 9.6025 18.8066 9.69743 18.7131L15.3853 13.3871C15.5791 13.2084 15.7338 12.9914 15.8396 12.7497C15.9454 12.508 16 12.247 16 11.9831C16 11.7192 15.9454 11.4582 15.8396 11.2165C15.7338 10.9749 15.5791 10.7578 15.3853 10.5791L15.3863 10.5831Z"
                            fill="#2F2F38"></path>
                    </svg>
                </a>
                <span class="text-sm font-normal text-gray-500 dark-text-gray-400">
                    @if ($transaksis->total() > 0)
                        Showing <span
                            class="font-semibold text-gray-900 dark-text-white">{{ $transaksis->firstItem() }}-{{ $transaksis->lastItem() }}</span>
                        of <span class="font-semibold text-gray-900 dark-text-white">{{ $transaksis->total() }}</span>
                    @else
                        No records found
                    @endif
                </span>
            </div>
            <div class="flex items-center space-x-3">
                @if ($transaksis->onFirstPage())
                    <a href="#"
                        class="inline-flex items-center justify-center flex-1 px-3 py-2 text-s cursor-not-allowed opacity-50
                            text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg minline-flex">
                        <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Previous
                    </a>
                @else
                    <a href="{{ $transaksis->previousPageUrl() }}"
                        class="inline-flex items-center justify-center flex-1 px-3 py-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover-bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg minline-flex">
                        <svg class="w-5 h-5 mr-1 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Previous
                    </a>
                @endif

                @if ($transaksis->hasMorePages())
                    <a href="{{ $transaksis->nextPageUrl() }}"
                        class="inline-flex items-center justify-center flex-1 px-3 py-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover-bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg minline-flex">
                        Next
                        <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @else
                    <a href="#"
                        class="inline-flex items-center justify-center flex-1 px-3 py-2 text-s cursor-not-allowed opacity-50
                            text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover-bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg minline-flex">
                        Next
                        <svg class="w-5 h-5 ml-1 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010-1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                @endif
            </div>
        </div>
    </div>
@endsection


@section('modals')
    <!-- modal Delete data transaksi -->
    @foreach ($transaksis as $transaksi)
        <div id="ModalDelete-{{ $transaksi->id }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full"
            data-modal-backdrop="static">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="ModalDelete-{{ $transaksi->id }}">
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
                            data pengguna ini? Anda dapat membatalkan.</h3>
                        <div class="flex items-center justify-center gap-2">
                            <a type="submit" href="{{ route('transaksi.hapus', $transaksi->id) }}"
                                class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">
                                Delete Data
                            </a>
                            <button data-modal-hide="ModalDelete-{{ $transaksi->id }}" type="button"
                                class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal delete --}}

    {{-- Modal Preview --}}
    @foreach ($transaksis as $transaksi)
        <div id="ModalPreview-{{ $transaksi->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 hidden z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full z-50 max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail Transaksi-{{ $transaksi->kode_invoice }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="ModalPreview-{{ $transaksi->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="grid grid-cols-3 gap-2 mb-4 p-5">
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Outlet</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $transaksi->outlet->nama }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Member</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $transaksi->member->nama }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Paket</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $transaksi->tanggal }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal Transaksi
                            </div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $transaksi->batas_waktu }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Batas Waktu</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $transaksi->tanggal_bayar }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal Bayar</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $transaksi->tanggal_bayar }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Diskon</div>
                            @if ($transaksi->diskon === null)
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    -
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    {{ $transaksi->diskon }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Pajak</div>
                            @if ($transaksi->pajak === null)
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    -
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    {{ $transaksi->pajak }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Biaya Tambahan</div>
                            @if ($transaksi->biaya_tambahan === null)
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    -
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    {{ $transaksi->biaya_tambahan }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Via Admin</div>
                            <div class="flex items-center font-bold text-gray-700 dark:text-gray-400">
                                {{ $transaksi->user->username }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-4 font-semibold leading-none text-gray-900 dark:text-white">Status Transaksi
                            </div>
                            @if ($transaksi->status === 'Pending')
                                <button type="button"
                                    class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 text-center mr-2 mb-2">
                                    {{ $transaksi->status }}
                                </button>
                            @else
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    {{ $transaksi->status }}
                                </button>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-4 font-semibold leading-none text-gray-900 dark:text-white">Status Bayar</div>
                            @if ($transaksi->status_bayar === 'Belum Bayar')
                                <button type="button"
                                    class="flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-base px-7 py-4 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 text-center mr-2 mb-2">
                                    {{ $transaksi->status_bayar }}
                                </button>
                            @else
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    {{ $transaksi->status_bayar }}
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal preview --}}
@endsection
