@extends('layouts.app')

@section('contents')
    {{-- Bagian header --}}
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
                                <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Paket</span>
                            </div>
                        </li>
                    </ol>
                </nav>
                <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Data Paket</h1>
                <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Manage all your existing
                    pakets or add a new one</p>
            </div>

            <div class="items-center justify-between block sm:flex md:divide-x md:divide-gray-100 dark:divide-gray-700">
                <div class="flex items-center mb-4 sm:mb-0">
                    <form class="sm:pr-3" action="{{ route('paket.cari') }}" method="GET">
                        <label for="products-search" class="sr-only">Search</label>
                        <div class="relative w-48 mt-1 sm:w-64 xl:w-96">
                            <input type="text" id="products-search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Search data paket" name="query">
                        </div>
                    </form>
                    <div class="flex items-center w-full sm:justify-end">
                        <div class="flex pl-2 space-x-1">
                            <a href=""
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="{{ route('paket') }}"
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M20 11C19.7348 11 19.4805 11.1054 19.2929 11.2929C19.1054 11.4804 19 11.7348 19 12C19.0011 13.3778 18.5952 14.7253 17.8333 15.8732C17.0713 17.0212 15.9873 17.9185 14.7172 18.4526C13.4471 18.9867 12.0476 19.1338 10.6942 18.8754C9.34083 18.6169 8.09395 17.9645 7.11003 17H10C10.2652 17 10.5196 16.8946 10.7071 16.7071C10.8947 16.5196 11 16.2652 11 16C11 15.7348 10.8947 15.4804 10.7071 15.2929C10.5196 15.1054 10.2652 15 10 15H5.23603C5.03843 14.9641 4.83458 14.9884 4.65103 15.07C4.63203 15.077 4.61403 15.081 4.59603 15.088C4.57803 15.095 4.56803 15.094 4.55603 15.102C4.52803 15.117 4.51203 15.144 4.48703 15.162C4.34044 15.2478 4.21854 15.37 4.1332 15.5169C4.04786 15.6637 4.00198 15.8302 4.00003 16V21C4.00003 21.2652 4.10539 21.5196 4.29292 21.7071C4.48046 21.8946 4.73481 22 5.00003 22C5.26525 22 5.5196 21.8946 5.70714 21.7071C5.89467 21.5196 6.00003 21.2652 6.00003 21V18.68C7.28976 19.847 8.89074 20.6142 10.6083 20.8883C12.3259 21.1624 14.0862 20.9316 15.6751 20.224C17.2639 19.5164 18.6131 18.3625 19.5584 16.9025C20.5037 15.4425 21.0046 13.7393 21 12C21 11.7348 20.8947 11.4804 20.7071 11.2929C20.5196 11.1054 20.2652 11 20 11Z"
                                        fill-rule="evenodd" />
                                    <path
                                        d="M5.00003 12C4.99895 10.6222 5.40485 9.27474 6.1668 8.12678C6.92874 6.97881 8.01278 6.08147 9.28287 5.54737C10.553 5.01328 11.9525 4.86621 13.3059 5.12465C14.6592 5.38308 15.9061 6.03549 16.89 7H14C13.7348 7 13.4805 7.10536 13.2929 7.29289C13.1054 7.48043 13 7.73478 13 8C13 8.26522 13.1054 8.51957 13.2929 8.70711C13.4805 8.89464 13.7348 9 14 9H18.768C18.9643 9.03562 19.1668 9.01123 19.349 8.93C19.368 8.923 19.386 8.919 19.404 8.912C19.422 8.905 19.431 8.906 19.444 8.898C19.472 8.883 19.488 8.856 19.514 8.838C19.6604 8.75203 19.782 8.6297 19.8672 8.48287C19.9523 8.33605 19.9981 8.16972 20 8V3C20 2.73478 19.8947 2.48043 19.7071 2.29289C19.5196 2.10536 19.2652 2 19 2C18.7348 2 18.4805 2.10536 18.2929 2.29289C18.1054 2.48043 18 2.73478 18 3V5.32C16.7103 4.15301 15.1093 3.38584 13.3917 3.11173C11.6741 2.83762 9.9139 3.06838 8.32501 3.77597C6.73611 4.48356 5.387 5.63749 4.44166 7.09749C3.49632 8.55749 2.99549 10.2607 3.00003 12C3.00003 12.2652 3.10539 12.5196 3.29292 12.7071C3.48046 12.8946 3.73481 13 4.00003 13C4.26525 13 4.5196 12.8946 4.70714 12.7071C4.89467 12.5196 5.00003 12.2652 5.00003 12Z"
                                        fill-rule="evenodd" />
                                </svg>
                            </a>
                            <a href=""
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href=""
                                class="inline-flex justify-center p-1 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <button type="button" data-modal-target="TambahDataModal" data-modal-toggle="TambahDataModal"
                    class="inline-flex items-center px-4 py-2 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                    <svg class="mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor">
                        <path
                            d="M12 2.5C10.1211 2.5 8.28435 3.05717 6.72209 4.10104C5.15982 5.14491 3.94218 6.62861 3.22315 8.36451C2.50412 10.1004 2.31598 12.0105 2.68254 13.8534C3.0491 15.6962 3.95389 17.3889 5.28249 18.7175C6.61109 20.0461 8.30383 20.9509 10.1466 21.3175C11.9895 21.684 13.8996 21.4959 15.6355 20.7769C17.3714 20.0578 18.8551 18.8402 19.899 17.2779C20.9428 15.7157 21.5 13.8789 21.5 12C21.4971 9.48134 20.4953 7.06667 18.7143 5.2857C16.9333 3.50474 14.5187 2.50291 12 2.5ZM16.242 13H13V16.242C13 16.5072 12.8946 16.7616 12.7071 16.9491C12.5196 17.1366 12.2652 17.242 12 17.242C11.7348 17.242 11.4804 17.1366 11.2929 16.9491C11.1054 16.7616 11 16.5072 11 16.242V13H7.758C7.49279 13 7.23843 12.8946 7.0509 12.7071C6.86336 12.5196 6.758 12.2652 6.758 12C6.758 11.7348 6.86336 11.4804 7.0509 11.2929C7.23843 11.1054 7.49279 11 7.758 11H11V7.758C11 7.49278 11.1054 7.23843 11.2929 7.05089C11.4804 6.86336 11.7348 6.758 12 6.758C12.2652 6.758 12.5196 6.86336 12.7071 7.05089C12.8946 7.23843 13 7.49278 13 7.758V11H16.242C16.5072 11 16.7616 11.1054 16.9491 11.2929C17.1366 11.4804 17.242 11.7348 17.242 12C17.242 12.2652 17.1366 12.5196 16.9491 12.7071C16.7616 12.8946 16.5072 13 16.242 13Z"
                            fill="#FFFFFF" />
                    </svg>
                    Create Paket
                </button>
            </div>

        </div>

    </div>
    {{-- end bagian header --}}

    {{-- Bagian Tabel Paket --}}
    <div class="flex flex-col sm:ml-64 mt-5">

        <div class="overflow-x-auto">

            <div class="inline-block min-w-full align-middle">

                <div class="overflow-hidden shadow ">

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

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Nama Outlet
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Jenis Paket
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Nama Paket
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Harga
                                </th>
                                <th scope="col"
                                    class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                            @if ($pakets->isEmpty())
                                <tr>
                                    <td colspan="5" class="w-full">
                                        <div class="p-5 mb-4 text-sm text-center text-red-800 bg-red-100 dark:bg-gray-800 dark:text-red-400"
                                            role="alert">
                                            <span class="font-medium"> Data not found.
                                        </div>
                                    </td>
                                </tr>
                            @else
                                @foreach ($pakets as $paket)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">

                                        <th scope="row"
                                            class="flex items-center py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="pl-4 mr-2 text-left">
                                                <div class="text-base font-semibold">{{ $paket->outlet->nama }}</div>
                                                <div class="font-normal text-gray-500">{{ $paket->outlet->alamat }}</div>
                                            </div>
                                        </th>

                                        <td
                                            class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                            {{ $paket->jenis }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $paket->nama_paket }}
                                        </td>
                                        <td
                                            class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="flex items-center gap-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <path
                                                        d="M13.146 6.68799C13.954 6.86819 14.6857 7.29608 15.239 7.91199C15.3243 8.01193 15.4285 8.09407 15.5456 8.15374C15.6627 8.2134 15.7905 8.24941 15.9215 8.25972C16.0525 8.27003 16.1843 8.25443 16.3093 8.21381C16.4343 8.17319 16.55 8.10835 16.65 8.02299C16.7499 7.93763 16.832 7.83343 16.8917 7.71632C16.9514 7.59921 16.9874 7.4715 16.9977 7.34048C17.008 7.20946 16.9924 7.07769 16.9518 6.95269C16.9112 6.8277 16.8463 6.71193 16.761 6.61199C15.9341 5.67739 14.836 5.02434 13.62 4.74399C13.412 4.69399 13.207 4.67599 13 4.64399V3.41699C13 3.15178 12.8946 2.89742 12.7071 2.70989C12.5195 2.52235 12.2652 2.41699 12 2.41699C11.7347 2.41699 11.4804 2.52235 11.2929 2.70989C11.1053 2.89742 11 3.15178 11 3.41699V4.67399C10.1557 4.77321 9.35685 5.10953 8.69584 5.644C8.03483 6.17847 7.53873 6.88923 7.26496 7.69399C7.13975 8.17068 7.11376 8.66799 7.18858 9.15513C7.26341 9.64227 7.43746 10.1089 7.69996 10.526C8.59747 11.9362 10.017 12.9336 11.648 13.3C12.7528 13.5399 13.7211 14.2001 14.348 15.141C14.4705 15.3287 14.5543 15.5389 14.5947 15.7593C14.635 15.9798 14.631 16.2061 14.583 16.425C14.231 17.698 12.423 18.403 10.629 17.967C9.81274 17.7855 9.07486 17.3504 8.52096 16.724C8.43672 16.6232 8.33345 16.54 8.21705 16.4791C8.10065 16.4182 7.9734 16.3809 7.84256 16.3692C7.57832 16.3455 7.31552 16.4279 7.11196 16.598C6.90841 16.7681 6.78078 17.0122 6.75715 17.2764C6.74545 17.4072 6.75963 17.5391 6.79889 17.6645C6.83815 17.7898 6.90172 17.9062 6.98596 18.007C7.81453 18.9598 8.92413 19.6251 10.155 19.907C10.4344 19.974 10.7181 20.0225 11.004 20.052V20.916C11.004 21.1812 11.1093 21.4356 11.2969 21.6231C11.4844 21.8106 11.7387 21.916 12.004 21.916C12.2692 21.916 12.5235 21.8106 12.7111 21.6231C12.8986 21.4356 13.004 21.1812 13.004 20.916V19.94C13.8048 19.8091 14.5547 19.462 15.1728 18.9361C15.7908 18.4102 16.2535 17.7256 16.511 16.956C16.6351 16.4794 16.6603 15.9824 16.5849 15.4956C16.5096 15.0089 16.3354 14.5428 16.073 14.126C15.1748 12.7175 13.7565 11.7208 12.127 11.353C11.0224 11.1131 10.0542 10.4533 9.42696 9.51299C9.30459 9.32506 9.2208 9.11469 9.18045 8.89409C9.14011 8.67349 9.14402 8.44707 9.19196 8.22799C9.54496 6.95699 11.356 6.25199 13.146 6.68799Z"
                                                        fill="#2F2F38" />
                                                </svg>
                                                Rp.{{ $paket->harga }}
                                            </div>
                                        </td>

                                        <td class="p-4 space-x-2 whitespace-nowrap">
                                            {{-- button update --}}
                                            <button type="button" data-modal-target="EditData-{{ $paket->id }}"
                                                data-modal-toggle="EditData-{{ $paket->id }}"
                                                class="inline-flex items-center px-3 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
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
                                                class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80"
                                                data-modal-target="popup-modal-{{ $paket->id }}"
                                                data-modal-toggle="popup-modal-{{ $paket->id }}">
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
    {{-- end bagian body --}}
@endsection

@section('modals')
    <!-- modal Delete data pengguna -->
    @foreach ($pakets as $paket)
        <div id="popup-modal-{{ $paket->id }}" tabindex="-1"
            class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button"
                        class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="popup-modal-{{ $paket->id }}">
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
                            data paket ini? Anda dapat membatalkan.</h3>
                        <a type="submit" href="{{ route('paket.hapus', $paket->id) }}"
                            class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-4 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 mr-2">
                            Delete Data
                        </a>
                        <button data-modal-hide="popup-modal-{{ $paket->id }}" type="button"
                            class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    {{-- end modal delete --}}
    @foreach ($pakets as $paket)
        <div id="EditData-{{ $paket->id }}" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <form action="{{ route('paket.tambah.update', $paket->id) }}" method="post"
                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    @csrf
                    <!-- Modal header -->
                    <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Update Data Paket
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="EditData-{{ $paket->id }}">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>

                    <div class="p-6 rounded-lg bg-blue-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                                class="font-medium text-gray-800 dark:text-white">Profile tab's associated
                                content</strong>. Clicking another tab will toggle the visibility of this one for the next.
                            The tab JavaScript swaps classes to control the content visibility and styling.</p>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="mb-2">
                                <label for="outlet"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Outlet</label>
                                <select id="outlet"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="id_outlet">
                                    <option value="" disabled selected>Select Outlet</option>
                                    @foreach ($outlets as $outlet)
                                        <option value="{{ $outlet->id }}"
                                            {{ isset($pakets) && $outlet->id == $paket->id_outlet ? 'selected' : '' }}>
                                            {{ $outlet->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-2">
                                <label for="role"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jeni Paket</label>
                                <select id="role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="jenis">
                                    <option value="" disabled selected>Select Jenis Paket</option>
                                    <option value="Kiloan"
                                        {{ isset($pakets) && $paket->jenis == 'Kiloan' ? 'selected' : '' }}>Kiloan
                                    </option>
                                    <option value="Selimut"
                                        {{ isset($pakets) && $paket->jenis == 'Selimut' ? 'selected' : '' }}>Selimut
                                    </option>
                                    <option value="Bed Cover"
                                        {{ isset($pakets) && $paket->jenis == 'Bed Cover' ? 'selected' : '' }}>Bed Cover
                                    </option>
                                    <option value="Kaos"
                                        {{ isset($pakets) && $paket->jenis == 'Kaos' ? 'selected' : '' }}>Kaos</option>
                                    <option value="Celana Jeans"
                                        {{ isset($pakets) && $paket->jenis == 'Celana Jeans' ? 'selected' : '' }}>Celana
                                        Jeans</option>
                                    <option value="Lain-Lain"
                                        {{ isset($pakets) && $paket->jenis == 'Lain-Lain' ? 'selected' : '' }}>Lain-Lain
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative mb-2">
                                <input type="text" id="floating_outlined"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " name="nama_paket"
                                    value="{{ isset($pakets) ? $paket->nama_paket : '' }}" />
                                <label for="floating_outlined"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                                    Paket</label>
                            </div>

                            <div class="relative mb-2">
                                <input type="number" id="floating_outlined"
                                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " name="harga" value="{{ isset($pakets) ? $paket->harga : '' }}" />
                                <label for="floating_outlined"
                                    class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Harga
                                    Paket</label>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button type="submit"
                            class="flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">Update
                            Data</button>

                        <button type="button" data-modal-hide="EditData-{{ $paket->id }}"
                            class="flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
    @endforeach



    {{-- Modal tambah data --}}
    <div id="TambahDataModal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <form action="{{ route('paket.tambah.simpan') }}" method="post"
                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                @csrf
                <div class="flex items-start justify-between p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Create Data Paket
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="TambahDataModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <div class="p-6 rounded-lg bg-blue-50 dark:bg-gray-800" id="profile" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong
                            class="font-medium text-gray-800 dark:text-white">Profile tab's associated content</strong>.
                        Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps
                        classes to control the content visibility and styling.</p>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="mb-2">
                            <label for="outlet"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Outlet</label>
                            <select id="outlet"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="id_outlet" required>
                                <option value="" disabled selected>Select Outlet</option>
                                @foreach ($outlets as $outlet)
                                    <option value="{{ $outlet->id }}">{{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-2">
                            <label for="role"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jeni Paket</label>
                            <select id="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="jenis" required>
                                <option value="" disabled selected>Select Jenis Paket</option>
                                <option value="Kiloan">Kiloan</option>
                                <option value="Selimut">Selimut</option>
                                <option value="Bed Cover">Bed Cover</option>
                                <option value="Kaos">Kaos</option>
                                <option value="Celana Jeans">Celana Jeans</option>
                                <option value="Lain-Lain">Lain-Lain</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative mb-2">
                            <input type="text" id="floating_outlined"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                required placeholder=" " name="nama_paket" />
                            <label for="floating_outlined"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nama
                                Paket</label>
                        </div>

                        <div class="relative mb-2">
                            <input type="number" id="floating_outlined"
                                class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                required placeholder=" " name="harga" />
                            <label for="floating_outlined"
                                class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Harga
                                Paket</label>
                        </div>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button type="submit"
                        class="flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">Create
                        Data</button>

                    <button type="button" data-modal-hide="TambahDataModal"
                        class="flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">Cancel</button>
                </div>
            </form>

        </div>
    </div>
    {{-- end modal delete --}}
@endsection
