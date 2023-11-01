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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Laporan
                                    Transaksi</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>

            {{-- Bagian Captio atau judul form --}}
            <div class="mt-5">
                <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <p class="text-2xl font-semibold">Data Laporan Transaksi</p>
                    <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Manage all your existing
                        laporan transaksis or add a new one</p>
                </caption>
            </div>
            {{-- End bagian captiomn --}}

            <div
                class="flex items-center justify-between gap-3 block sm:flex md:flex md:divide-gray-100 dark:divide-gray-700">
                <div class="flex items-center gap-3">
                    <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex px-5 py-2.5 text-center inline-flex items-center"
                        type="button">Filter Bulan <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>

                    <button id="dropdownFilter" data-dropdown-toggle="dropdownfilter" data-dropdown-trigger="hover"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex px-5 py-2.5 text-center inline-flex items-center"
                        type="button">Filter Laporan <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                </div>

                <!-- Dropdown menu -->
                <div id="dropdownHover"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li>
                            <a href="{{ route('laporan.filter', ['bulan' => '01']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Januari</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.filter', ['bulan' => '02']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Febuari</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.filter', ['bulan' => '03']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Maret</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.filter', ['bulan' => '04']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                April</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.filter', ['bulan' => '05']) }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Mei</a>
                        </li>
                    </ul>
                </div>

                <!-- Dropdown menu -->
                <div id="dropdownfilter"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownFilter">
                        <li>
                            <a href="{{ route('laporan') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Reset</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.semua') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua
                                Data</a>
                        </li>
                        <li>
                            <a href="{{ route('laporan.terbaru') }}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                Data Terbaru</a>
                        </li>
                    </ul>
                </div>
                <!-- Button Export Data -->
                <a type="button" href="{{ route('laporan.cetak') }}"
                    class="inline-flex justify-end gap-3 items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M6.5 13H6V14H6.5C6.63261 14 6.75979 13.9473 6.85355 13.8536C6.94732 13.7598 7 13.6326 7 13.5C7 13.3674 6.94732 13.2402 6.85355 13.1464C6.75979 13.0527 6.63261 13 6.5 13Z"
                            fill="white" />
                        <path
                            d="M9 7V2.13C8.51204 2.26498 8.06685 2.52286 7.707 2.879L4.879 5.707C4.52286 6.06685 4.26498 6.51204 4.13 7H9Z"
                            fill="white" />
                        <path
                            d="M12.375 13H12V16H12.375C12.5408 16 12.6997 15.9342 12.8169 15.8169C12.9342 15.6997 13 15.5408 13 15.375V13.625C13 13.4592 12.9342 13.3003 12.8169 13.1831C12.6997 13.0658 12.5408 13 12.375 13Z"
                            fill="white" />
                        <path
                            d="M21 9H20V4C20.0083 3.47862 19.8094 2.97524 19.4471 2.6003C19.0847 2.22536 18.5884 2.00947 18.067 2H11V7C11 7.53043 10.7893 8.03914 10.4142 8.41421C10.0391 8.78929 9.53043 9 9 9H3C2.73478 9 2.48043 9.10536 2.29289 9.29289C2.10536 9.48043 2 9.73478 2 10V19C2 19.2652 2.10536 19.5196 2.29289 19.7071C2.48043 19.8946 2.73478 20 3 20H4C3.9917 20.5214 4.19056 21.0248 4.55294 21.3997C4.91533 21.7746 5.41164 21.9905 5.933 22H18.067C19.167 22 19.767 20.764 19.923 20.386C19.9719 20.2633 19.9957 20.1321 19.993 20H21C21.2652 20 21.5196 19.8946 21.7071 19.7071C21.8946 19.5196 22 19.2652 22 19V10C22 9.73478 21.8946 9.48043 21.7071 9.2929C21.5196 9.10536 21.2652 9 21 9ZM6.5 16H6V17C6 17.2652 5.89464 17.5196 5.70711 17.7071C5.51957 17.8946 5.26522 18 5 18C4.73478 18 4.48043 17.8946 4.29289 17.7071C4.10536 17.5196 4 17.2652 4 17V12C4 11.7348 4.10536 11.4804 4.29289 11.2929C4.48043 11.1054 4.73478 11 5 11H6.5C7.16304 11 7.79893 11.2634 8.26777 11.7322C8.73661 12.2011 9 12.837 9 13.5C9 14.163 8.73661 14.7989 8.26777 15.2678C7.79893 15.7366 7.16304 16 6.5 16ZM15 15.375C14.9989 16.0709 14.722 16.7379 14.23 17.23C13.7379 17.722 13.0709 17.9989 12.375 18H11C10.7348 18 10.4804 17.8946 10.2929 17.7071C10.1054 17.5196 10 17.2652 10 17V12C10 11.7348 10.1054 11.4804 10.2929 11.2929C10.4804 11.1054 10.7348 11 11 11H12.375C13.0709 11.0011 13.7379 11.278 14.23 11.77C14.722 12.2621 14.9989 12.9291 15 13.625V15.375ZM19 14C19.2652 14 19.5196 14.1054 19.7071 14.2929C19.8946 14.4804 20 14.7348 20 15C20 15.2652 19.8946 15.5196 19.7071 15.7071C19.5196 15.8946 19.2652 16 19 16H18V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V12C16 11.7348 16.1054 11.4804 16.2929 11.2929C16.4804 11.1054 16.7348 11 17 11H19C19.2652 11 19.5196 11.1054 19.7071 11.2929C19.8946 11.4804 20 11.7348 20 12C20 12.2652 19.8946 12.5196 19.7071 12.7071C19.5196 12.8946 19.2652 13 19 13H18V14H19Z"
                            fill="white" />
                    </svg>
                    Export Data
                </a>
            </div>

            <div class="mt-10">
                <form action="{{ route('laporan.cari') }}" method="GET">
                    @csrf
                    <div class="flex">
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border-l-gray-50 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500"
                                placeholder="Search Member, Status, Outlet or Paket..." required name="query">
                            <button type="submit"
                                class="absolute top-0 right-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>

    {{-- Bagian Tabel User --}}
    <div class="flex flex-col sm:ml-64 mt-6">

        <div class="overflow-hidden">

            <div class="overflow-x-auto">

                <div class="inline-block min-w-full align-middle">

                    <div class="overflow-x-auto shadow ">

                        {{-- Bagian alert succes jika data berhasil di update atau di hapus --}}
                        @if (session('success'))
                            <div id="alert-3"
                                class="flex items-center p-4 text-green-800 bg-green-100 dark:bg-gray-800 dark:text-green-400"
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
                                        Nama Paket
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Harga Paket
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Qty
                                    </th>
                                    <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Total Harga
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
                                @if ($detailtransaksis->isEmpty())
                                    <tr>
                                        <td colspan="13" class="w-full">
                                            <div class="p-5 mb-4 text-sm text-center text-red-800 bg-red-100 dark:bg-gray-800 dark:text-red-400"
                                                role="alert">
                                                <span class="font-medium"> Data not found.
                                            </div>
                                        </td>
                                    </tr>
                                @else
                                    @foreach ($detailtransaksis as $detail)
                                        <tr>
                                            <td
                                                class="max-w-sm p-6 overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $detail->transaksi->kode_invoice }}
                                            </td>

                                            <td class="items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">
                                                        {{ $detail->transaksi->outlet->nama }}</div>
                                                    <div class="font-normal text-gray-500">
                                                        {{ $detail->transaksi->outlet->alamat }}</div>
                                                </div>
                                            </td>

                                            <td
                                                class="flex items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">
                                                        {{ $detail->transaksi->member->nama }}</div>
                                                    @if ($detail->transaksi->member->status === 'Member')
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
                                                                {{ $detail->transaksi->member->status }}
                                                            </div>
                                                        </div>
                                                    @else
                                                        <div class="flex items-center justify-center">
                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                                            <div class="font-normal text-gray-500">
                                                                {{ $detail->transaksi->member->status }}
                                                            </div>
                                                    @endif
                                            </td>

                                            <td class="items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">{{ $detail->paket->nama_paket }}
                                                    </div>
                                                    <div class="font-normal text-gray-500">{{ $detail->paket->jenis }}
                                                    </div>
                                                </div>
                                            </td>

                                            <td
                                                class="max-w-sm p-6 text-center overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $detail->paket->harga }}
                                            </td>


                                            <td
                                                class="max-w-sm p-6 text-center overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $detail->qty }}
                                            </td>

                                            <td
                                                class="max-w-sm p-6 text-center overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $detail->totalharga }}
                                            </td>

                                            <td
                                                class="max-w-sm p-6 text-center overflow-hidden text-base font-semibold text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $detail->transaksi->tanggal }}
                                            </td>

                                            @if ($detail->transaksi->tanggal_bayar === null)
                                                <td
                                                    class="max-w-sm p-6 overflow-hidden text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                                    -
                                                </td>
                                            @else
                                                <td
                                                    class="max-w-sm p-6 overflow-hidden text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                                    {{ $detail->transaksi->tanggal_bayar }}
                                                </td>
                                            @endif

                                            @if ($detail->transaksi->status === 'Pending')
                                                <td>
                                                    <span
                                                        class="bg-purple-100 text-purple-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-purple-100 dark:bg-gray-700 dark:border-purple-500 dark:text-purple-400">{{ $detail->transaksi->status }}</span>
                                                </td>
                                            @elseif ($detail->transaksi->status === 'Proses')
                                                <td>
                                                    <span
                                                        class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md border border-yellow-100 dark:bg-gray-700 dark:border-yellow-500 dark:text-purple-400">{{ $detail->transaksi->status }}</span>
                                                </td>
                                            @else
                                                <td>
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">{{ $detail->transaksi->status }}</span>
                                                </td>
                                            @endif

                                            @if ($detail->transaksi->status_bayar === 'Belum Bayar')
                                                <td>
                                                    <span
                                                        class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-6.5 py-1.5 rounded-md border border-red-100 dark:border-red-400 dark:bg-gray-700 dark:text-red-400">{{ $detail->transaksi->status_bayar }}</span>
                                                </td>
                                            @else
                                                <td>
                                                    <span
                                                        class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded-md dark:bg-gray-700 dark:text-green-400 border border-green-100 dark:border-green-500">{{ $detail->transaksi->status_bayar }}</span>
                                                </td>
                                            @endif

                                            <td class="items-center py-6 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">
                                                        {{ $detail->transaksi->user->email }}
                                                    </div>
                                                    <div class="font-normal text-gray-500">
                                                        {{ $detail->transaksi->user->role }}
                                                    </div>
                                                </div>
                                            </td>

                                            {{-- action --}}
                                            <td class="p-6 space-x-2 whitespace-nowrap">
                                                {{-- button delete --}}
                                                <button type="button"
                                                    data-modal-target="static-modal-{{ $detail->id }}"
                                                    data-modal-toggle="static-modal-{{ $detail->id }}"
                                                    class="inline-flex items-center px-3 py-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                    Preview
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
                        @if ($detailtransaksis->total() > 0)
                            Showing <span
                                class="font-semibold text-gray-900 dark-text-white">{{ $detailtransaksis->firstItem() }}-{{ $detailtransaksis->lastItem() }}</span>
                            of <span
                                class="font-semibold text-gray-900 dark-text-white">{{ $detailtransaksis->total() }}</span>
                        @else
                            No records found
                        @endif
                    </span>
                </div>
                <div class="flex items-center space-x-3">
                    @if ($detailtransaksis->onFirstPage())
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
                        <a href="{{ $detailtransaksis->previousPageUrl() }}"
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

                    @if ($detailtransaksis->hasMorePages())
                        <a href="{{ $detailtransaksis->nextPageUrl() }}"
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
    </div>
    </div>
    {{-- end tabel pengguna --}}
@endsection


@section('modals')
    @foreach ($detailtransaksis as $detail)
        <div id="static-modal-{{ $detail->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 hidden z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full z-50 max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Detail Transaksi-{{ $detail->transaksi->kode_invoice }}
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="static-modal-{{ $detail->id }}">
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
                                {{ $detail->transaksi->outlet->nama }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 sm:col-span-1 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Member</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->transaksi->member->nama }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Nama Paket</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->paket->nama_paket }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal Transaksi
                            </div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->transaksi->tanggal }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Batas Waktu</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->transaksi->batas_waktu }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Tanggal Bayar</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->transaksi->tanggal_bayar }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Harga Paket</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->paket->harga }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Qty</div>
                            <div class="flex items-center text-gray-500 dark:text-gray-400">
                                {{ $detail->qty }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Diskon</div>
                            @if ($detail->transaksi->diskon === null)
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    -
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    {{ $detail->transaksi->diskon }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Pajak</div>
                            @if ($detail->transaksi->pajak === null)
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    -
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    {{ $detail->transaksi->pajak }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Biaya Tambahan</div>
                            @if ($detail->transaksi->biaya_tambahan === null)
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    -
                                </div>
                            @else
                                <div class="flex items-center text-gray-500 dark:text-gray-400">
                                    {{ $detail->transaksi->biaya_tambahan }}
                                </div>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Total Harga</div>
                            <div class="flex items-center font-bold text-gray-700 dark:text-gray-400">
                                {{ $detail->totalharga }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-2 font-semibold leading-none text-gray-900 dark:text-white">Via Admin</div>
                            <div class="flex items-center font-bold text-gray-700 dark:text-gray-400">
                                {{ $detail->transaksi->user->nama }}
                            </div>
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-4 font-semibold leading-none text-gray-900 dark:text-white">Status Transaksi
                            </div>
                            @if ($detail->transaksi->status === 'Pending')
                                <button type="button"
                                    class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 text-center mr-2 mb-2">
                                    {{ $detail->transaksi->status }}
                                </button>
                            @else
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    {{ $detail->transaksi->status }}
                                </button>
                            @endif
                        </div>
                        <div
                            class="p-3 bg-gray-100 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="mb-4 font-semibold leading-none text-gray-900 dark:text-white">Status Bayar</div>
                            @if ($detail->transaksi->status_bayar === 'Belum Bayar')
                                <button type="button"
                                    class="flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-base px-7 py-4 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 text-center mr-2 mb-2">
                                    {{ $detail->transaksi->status_bayar }}
                                </button>
                            @else
                                <button type="button"
                                    class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                    {{ $detail->transaksi->status_bayar }}
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
