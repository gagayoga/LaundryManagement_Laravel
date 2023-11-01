@extends('layouts.app')

@section('contents')
    <div class="pt-4 sm:ml-64 bg-white mt-3">
        <div class="p-4  border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14 bg-blue">

            <div
                class="flowbite-section flex flex-col gap-4 sm:flex-row justify-center items-center bg-white dark:bg-gray-900 w-full bg-white border border-gray-200 rounded-lg shadow dark:border-gray-700">
                <div class="flex-1 px-8 py-4">
                    <h5 class="mb-5 text-4xl font-bold text-grsy-900 dark:text-white">Welcome to Sistem Pengelola Laundry
                    </h5>
                    <p class="mb-5 text-base w-50 text-gray-700 sm:text-base dark:text-gray-400 text-left"> Solusi Canggih
                        untuk Pengelolaan Usaha
                        Laundry. Kami membantu Anda mengatur pesanan, inventaris, pelanggan, dan keuangan secara efisien.
                        Hemat
                        waktu dan upaya Anda, fokuslah pada pertumbuhan bisnis Anda bersama kami!</p>
                    <div class="items-left justify-left space-y-4 sm:flex sm:space-y-0 sm:space-x-4">
                        <button type="button"
                            class="inline-flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">Mulai
                            Sekarang!</button>
                    </div>
                </div>

                <div class="flex-1 justify-end rounded-lg h-80 w-100"
                    style="background-image: url({{ asset('images/login.jpg') }}); background-size:cover;">
                </div>
            </div>

            <!-- content data transaksi untuk admin dan kasir-->
            @if (Auth::user()->role === 'Administrator' or Auth::user()->role === 'Kasir')
                <div class="p-4 flex flex-col mt-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:py-4">
                    {{-- caption table paket --}}
                    <div class="flex flex-wrap gap-4 sm:flex-row justify-center items-center">
                        <div class="flex-1 px-4 py-4">
                            <p class="text-xl font-semibold mb-1 text-gray-900 dark:text-white">Transaksi Recents</p>
                            <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of latest
                                transaksis</span>
                        </div>
                        {{-- button export data --}}
                        <a type="button" href="{{ route('pengguna.tambah') }}"
                            class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-4 py-2.5 text-center mr-2 mb-2">
                            View All
                        </a>
                        {{-- end button export --}}
                    </div>
                    {{-- end caption table --}}
                    <div class="overflow-x-auto rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-x-auto rounded-lg shadow sm:rounded-lg">

                                <table class="min-w-full mt-2 divide-y divide-gray-200 dark:divide-gray-600 ">
                                    <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Nama Outlet
                                    </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Kode Transaksi
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
                                    </tr>
                                </thead>
                                    <tbody class="bg-white dark:bg-gray-800">
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
                                            <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="mr-2 text-left">
                                                <div class="text-base font-semibold">{{ $transaksi->outlet->nama }}
                                                </div>
                                                <div class="font-normal text-gray-500">{{ $transaksi->outlet->alamat }}
                                                </div>
                                            </div>
                                        </th>
                                            <td
                                                class="max-w-sm px-6 py-4 overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->kode_invoice }}
                                            </td>
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">{{ $transaksi->member->nama }}
                                                    </div>
                                                    @if ($transaksi->member->status === 'Member')
                                                        <div class="flex items-center justify-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="10" viewBox="0 0 10 10" fill="none">
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
                                                        <div class="flex items-center justify-center gap-1">
                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                                            <div class="font-normal text-gray-500">
                                                                {{ $transaksi->member->status }}
                                                            </div>
                                                    @endif
                                                </div>
                                            </th>
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->tanggal }}
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
                                            <td
                                                class="max-w-sm px-6 py-4 overflow-hidden text-center text-center text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->status_bayar }}
                                            </td>
                                            <th scope="row"
                                                class="flex items-center py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">{{ $transaksi->user->nama }}
                                                    </div>
                                                    <div class="font-normal text-gray-500">{{ $transaksi->user->role }}
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            @endif
            {{-- end content data transaksi --}}

            <!-- content data user untuk admin -->
            @if (Auth::user()->role === 'Administrator')
                <div class="p-4 flex flex-col mt-6 bg-white border border-gray-200 rounded-lg shadow-sm sm:py-4">
                    <div class="px-4 py-4">
                        <p class="text-xl font-semibold mb-1 text-gray-900 dark:text-white">Users Recent</p>
                        <span class="text-base font-normal text-gray-500 dark:text-gray-400">This is a list of latest
                            user</span>
                    </div>
                    <div class="overflow-x-auto rounded-lg">
                        <div class="inline-block min-w-full align-middle">
                            <div class="overflow-x-auto rounded-lg shadow sm:rounded-lg">

                                <table class="min-w-full mt-2 divide-y divide-gray-200 dark:divide-gray-600 ">
                                    <thead class="bg-gray-50 dark:bg-gray-700">
                                        <tr>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Username
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Outlet
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Role User
                                            </th>
                                            <th scope="col"
                                                class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white dark:bg-gray-800">
                                        @foreach ($users as $user)
                                            <tr class="bg-gray-50 dark:bg-gray-700">
                                                <th scope="row"
                                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                    <div class="w-10 h-10 bg-cover bg-center rounded-full"
                                                        style="background-image: url('{{ asset('images/upload') }}/{{ $user->image }}');">
                                                    </div>
                                                    <div class="pl-4 mr-5 text-left">
                                                        <div class="text-base font-semibold">{{ $user->nama }}</div>
                                                        <div class="font-normal text-gray-500">{{ $user->username }}</div>
                                                    </div>
                                                </th>
                                                <td
                                                    class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                    {{ $user->outlet->nama }}
                                                </td>
                                                <td
                                                    class="p-4 text-sm font-semibold text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $user->role }}
                                                </td>
                                                @if ($user->status === 'Online')
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-500 white space-nowrap dark:text-gray-400">
                                                        <button type="button"
                                                            class="text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 shadow-lg shadow-green-500/50 dark:shadow-lg dark:shadow-green-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
                                                            {{ $user->status }}
                                                        </button>
                                                    </td>
                                                @else
                                                    <td
                                                        class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                                                        <button type="button"
                                                            class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80 text-center mr-2 mb-2">
                                                            {{ $user->status }}
                                                        </button>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- end content data user --}}

            @if (Auth::user()->role === 'Owner')
                <div class="mb-4 dark:border-gray-700  bg-white border border-gray-200 rounded-lg shadow-sm mt-6">
                    <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab"
                        data-tabs-toggle="#default-tab-content" role="tablist">
                        <li class="mr-2" role="presentation">
                            <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab"
                                data-tabs-target="#profile" type="button" role="tab" aria-controls="profile"
                                aria-selected="false">Transaksi</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab"
                                aria-controls="dashboard" aria-selected="false">
                                Outlet</button>
                        </li>
                        <li class="mr-2" role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="settings-tab" data-tabs-target="#settings" type="button" role="tab"
                                aria-controls="settings" aria-selected="false">Paket</button>
                        </li>
                        <li role="presentation">
                            <button
                                class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300"
                                id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab"
                                aria-controls="contacts" aria-selected="false">Member</button>
                        </li>
                    </ul>
                </div>
                <div id="default-tab-content">
                    {{-- tab transaksi --}}
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel"
                        aria-labelledby="profile-tab">
                        {{-- caption table paket --}}
                        <div class="flex flex-wrap gap-4 sm:flex-row justify-center items-center">
                            <div class="flex-1 items-center">
                                <caption class="p-3 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    <p class="text-xl font-semibold">Data Transaksi</p>
                                    <p class="mt-2 mb-3 text-base font-normal text-gray-500 dark:text-gray-400">Manage all
                                        your existing transaksis or add a new one</p>
                                </caption>
                            </div>
                            {{-- button export data --}}
                            <a type="button" href="{{ route('laporan.cetak') }}"
                                class="inline-flex gap-3 items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
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
                                        d="M21 9H20V4C20.0083 3.47862 19.8094 2.97524 19.4471 2.6003C19.0847 2.22536 18.5884 2.00947 18.067 2H11V7C11 7.53043 10.7893 8.03914 10.4142 8.41421C10.0391 8.78929 9.53043 9 9 9H3C2.73478 9 2.48043 9.10536 2.29289 9.29289C2.10536 9.48043 2 9.73478 2 10V19C2 19.2652 2.10536 19.5196 2.29289 19.7071C2.48043 19.8946 2.73478 20 3 20H4C3.9917 20.5214 4.19056 21.0248 4.55294 21.3997C4.91533 21.7746 5.41164 21.9905 5.933 22H18.067C19.167 22 19.767 20.764 19.923 20.386C19.9719 20.2633 19.9957 20.1321 19.993 20H21C21.2652 20 21.5196 19.8946 21.7071 19.7071C21.8946 19.5196 22 19.2652 22 19V10C22 9.73478 21.8946 9.48043 21.7071 9.29289C21.5196 9.10536 21.2652 9 21 9ZM6.5 16H6V17C6 17.2652 5.89464 17.5196 5.70711 17.7071C5.51957 17.8946 5.26522 18 5 18C4.73478 18 4.48043 17.8946 4.29289 17.7071C4.10536 17.5196 4 17.2652 4 17V12C4 11.7348 4.10536 11.4804 4.29289 11.2929C4.48043 11.1054 4.73478 11 5 11H6.5C7.16304 11 7.79893 11.2634 8.26777 11.7322C8.73661 12.2011 9 12.837 9 13.5C9 14.163 8.73661 14.7989 8.26777 15.2678C7.79893 15.7366 7.16304 16 6.5 16ZM15 15.375C14.9989 16.0709 14.722 16.7379 14.23 17.23C13.7379 17.722 13.0709 17.9989 12.375 18H11C10.7348 18 10.4804 17.8946 10.2929 17.7071C10.1054 17.5196 10 17.2652 10 17V12C10 11.7348 10.1054 11.4804 10.2929 11.2929C10.4804 11.1054 10.7348 11 11 11H12.375C13.0709 11.0011 13.7379 11.278 14.23 11.77C14.722 12.2621 14.9989 12.9291 15 13.625V15.375ZM19 14C19.2652 14 19.5196 14.1054 19.7071 14.2929C19.8946 14.4804 20 14.7348 20 15C20 15.2652 19.8946 15.5196 19.7071 15.7071C19.5196 15.8946 19.2652 16 19 16H18V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V12C16 11.7348 16.1054 11.4804 16.2929 11.2929C16.4804 11.1054 16.7348 11 17 11H19C19.2652 11 19.5196 11.1054 19.7071 11.2929C19.8946 11.4804 20 11.7348 20 12C20 12.2652 19.8946 12.5196 19.7071 12.7071C19.5196 12.8946 19.2652 13 19 13H18V14H19Z"
                                        fill="white" />
                                </svg>
                                Export Data
                            </a>
                            {{-- end button export --}}
                        </div>
                        {{-- end caption table --}}

                        {{-- bagian tabel paket --}}
                        <div class="overflow-x-auto shadow mt-3">
                            {{-- Tabel outlet --}}
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col"
                                        class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                        Nama Outlet
                                    </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Kode Transaksi
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
                                            Batas Waktu
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Tanggal Bayar
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Biaya Tambahan
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Diskon
                                        </th>
                                        <th scope="col"
                                            class="p-4 text-xs font-medium tracking-wider text-left text-gray-500 uppercase dark:text-white">
                                            Pajak
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
                                    </tr>
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
                                            <th scope="row"
                                            class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            <div class="mr-2 text-left">
                                                <div class="text-base font-semibold">{{ $transaksi->outlet->nama }}
                                                </div>
                                                <div class="font-normal text-gray-500">{{ $transaksi->outlet->alamat }}
                                                </div>
                                            </div>
                                        </th>
                                            <td
                                                class="max-w-sm px-6 py-4 overflow-hidden text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->kode_invoice }}
                                            </td>
                                            <th scope="row"
                                                class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">{{ $transaksi->member->nama }}
                                                    </div>
                                                    @if ($transaksi->member->status === 'Member')
                                                        <div class="flex items-center justify-center gap-1">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="10"
                                                                height="10" viewBox="0 0 10 10" fill="none">
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
                                                        <div class="flex items-center justify-center gap-1">
                                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                                            <div class="font-normal text-gray-500">
                                                                {{ $transaksi->member->status }}
                                                            </div>
                                                    @endif
                                                </div>
                                            </th>
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->tanggal }}
                                            </td>
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-center text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->batas_waktu }}
                                            </td>
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-base font-semibold text-gray-600 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->tanggal_bayar }}
                                            </td>
                                            @if ($transaksi->biaya_tamabahan === null)
                                                <td
                                                    class="max-w-sm p-4 overflow-hidden text-center text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                    -
                                                </td>
                                            @else
                                                <td
                                                    class="max-w-sm p-4 overflow-hidden text-center text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                    {{ $transaksi->biaya_tamabahan }}
                                                </td>
                                            @endif
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-center text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->diskon }}
                                            </td>
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-center text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->pajak }}
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
                                            <td
                                                class="max-w-sm px-6 py-4 overflow-hidden text-center text-center text-base font-semibold text-gray-900 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $transaksi->status_bayar }}
                                            </td>
                                            <th scope="row"
                                                class="flex items-center py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">{{ $transaksi->user->nama }}
                                                    </div>
                                                    <div class="font-normal text-gray-500">{{ $transaksi->user->role }}
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                        {{-- end bagian teble paket --}}
                    </div>

                    {{-- tab outlet --}}
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel"
                        aria-labelledby="dashboard-tab">

                        {{-- caption table outlet --}}
                        <div class="flex flex-wrap gap-4 sm:flex-row justify-center items-center">
                            <div class="flex-1 items-center">
                                <caption class="p-3 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    <p class="text-xl font-semibold"> Data Outlet</p>
                                    <p class="mt-2 mb-3 text-base font-normal text-gray-500 dark:text-gray-400">Manage all
                                        your existing outlets or add a new one</p>
                                </caption>
                            </div>
                            {{-- button export data --}}
                            <a type="button" href="{{ route('pengguna.tambah') }}"
                                class="inline-flex gap-3 items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
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
                                        d="M21 9H20V4C20.0083 3.47862 19.8094 2.97524 19.4471 2.6003C19.0847 2.22536 18.5884 2.00947 18.067 2H11V7C11 7.53043 10.7893 8.03914 10.4142 8.41421C10.0391 8.78929 9.53043 9 9 9H3C2.73478 9 2.48043 9.10536 2.29289 9.29289C2.10536 9.48043 2 9.73478 2 10V19C2 19.2652 2.10536 19.5196 2.29289 19.7071C2.48043 19.8946 2.73478 20 3 20H4C3.9917 20.5214 4.19056 21.0248 4.55294 21.3997C4.91533 21.7746 5.41164 21.9905 5.933 22H18.067C19.167 22 19.767 20.764 19.923 20.386C19.9719 20.2633 19.9957 20.1321 19.993 20H21C21.2652 20 21.5196 19.8946 21.7071 19.7071C21.8946 19.5196 22 19.2652 22 19V10C22 9.73478 21.8946 9.48043 21.7071 9.29289C21.5196 9.10536 21.2652 9 21 9ZM6.5 16H6V17C6 17.2652 5.89464 17.5196 5.70711 17.7071C5.51957 17.8946 5.26522 18 5 18C4.73478 18 4.48043 17.8946 4.29289 17.7071C4.10536 17.5196 4 17.2652 4 17V12C4 11.7348 4.10536 11.4804 4.29289 11.2929C4.48043 11.1054 4.73478 11 5 11H6.5C7.16304 11 7.79893 11.2634 8.26777 11.7322C8.73661 12.2011 9 12.837 9 13.5C9 14.163 8.73661 14.7989 8.26777 15.2678C7.79893 15.7366 7.16304 16 6.5 16ZM15 15.375C14.9989 16.0709 14.722 16.7379 14.23 17.23C13.7379 17.722 13.0709 17.9989 12.375 18H11C10.7348 18 10.4804 17.8946 10.2929 17.7071C10.1054 17.5196 10 17.2652 10 17V12C10 11.7348 10.1054 11.4804 10.2929 11.2929C10.4804 11.1054 10.7348 11 11 11H12.375C13.0709 11.0011 13.7379 11.278 14.23 11.77C14.722 12.2621 14.9989 12.9291 15 13.625V15.375ZM19 14C19.2652 14 19.5196 14.1054 19.7071 14.2929C19.8946 14.4804 20 14.7348 20 15C20 15.2652 19.8946 15.5196 19.7071 15.7071C19.5196 15.8946 19.2652 16 19 16H18V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V12C16 11.7348 16.1054 11.4804 16.2929 11.2929C16.4804 11.1054 16.7348 11 17 11H19C19.2652 11 19.5196 11.1054 19.7071 11.2929C19.8946 11.4804 20 11.7348 20 12C20 12.2652 19.8946 12.5196 19.7071 12.7071C19.5196 12.8946 19.2652 13 19 13H18V14H19Z"
                                        fill="white" />
                                </svg>
                                Export Data
                            </a>
                            {{-- end button export --}}
                        </div>
                        {{-- end caption table --}}

                        {{-- bagian tabel outlet --}}
                        <div class="overflow-x-auto shadow mt-3">
                            {{-- Tabel outlet --}}
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
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
                                    @foreach ($outlets as $outlet)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                            {{-- nama --}}
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
                                            {{-- alamat --}}
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
                                            {{-- action --}}
                                            <td class="p-4 space-x-2 whitespace-nowrap">
                                                {{-- button delete --}}
                                                <button type="button"
                                                    class="py-2.5 px-5 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
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
                                </tbody>
                            </table>
                        </div>
                        {{-- end bagian teble outlet --}}
                    </div>

                    {{-- tab paket --}}
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel"
                        aria-labelledby="settings-tab">
                        {{-- caption table paket --}}
                        <div class="flex flex-wrap gap-4 sm:flex-row justify-center items-center">
                            <div class="flex-1 items-center">
                                <caption class="p-3 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    <p class="text-xl font-semibold"> Data Paket</p>
                                    <p class="mt-2 mb-3 text-base font-normal text-gray-500 dark:text-gray-400">Manage all
                                        your existing pakets or add a new one</p>
                                </caption>
                            </div>
                            {{-- button export data --}}
                            <a type="button" href="{{ route('pengguna.tambah') }}"
                                class="inline-flex gap-3 items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
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
                                        d="M21 9H20V4C20.0083 3.47862 19.8094 2.97524 19.4471 2.6003C19.0847 2.22536 18.5884 2.00947 18.067 2H11V7C11 7.53043 10.7893 8.03914 10.4142 8.41421C10.0391 8.78929 9.53043 9 9 9H3C2.73478 9 2.48043 9.10536 2.29289 9.29289C2.10536 9.48043 2 9.73478 2 10V19C2 19.2652 2.10536 19.5196 2.29289 19.7071C2.48043 19.8946 2.73478 20 3 20H4C3.9917 20.5214 4.19056 21.0248 4.55294 21.3997C4.91533 21.7746 5.41164 21.9905 5.933 22H18.067C19.167 22 19.767 20.764 19.923 20.386C19.9719 20.2633 19.9957 20.1321 19.993 20H21C21.2652 20 21.5196 19.8946 21.7071 19.7071C21.8946 19.5196 22 19.2652 22 19V10C22 9.73478 21.8946 9.48043 21.7071 9.29289C21.5196 9.10536 21.2652 9 21 9ZM6.5 16H6V17C6 17.2652 5.89464 17.5196 5.70711 17.7071C5.51957 17.8946 5.26522 18 5 18C4.73478 18 4.48043 17.8946 4.29289 17.7071C4.10536 17.5196 4 17.2652 4 17V12C4 11.7348 4.10536 11.4804 4.29289 11.2929C4.48043 11.1054 4.73478 11 5 11H6.5C7.16304 11 7.79893 11.2634 8.26777 11.7322C8.73661 12.2011 9 12.837 9 13.5C9 14.163 8.73661 14.7989 8.26777 15.2678C7.79893 15.7366 7.16304 16 6.5 16ZM15 15.375C14.9989 16.0709 14.722 16.7379 14.23 17.23C13.7379 17.722 13.0709 17.9989 12.375 18H11C10.7348 18 10.4804 17.8946 10.2929 17.7071C10.1054 17.5196 10 17.2652 10 17V12C10 11.7348 10.1054 11.4804 10.2929 11.2929C10.4804 11.1054 10.7348 11 11 11H12.375C13.0709 11.0011 13.7379 11.278 14.23 11.77C14.722 12.2621 14.9989 12.9291 15 13.625V15.375ZM19 14C19.2652 14 19.5196 14.1054 19.7071 14.2929C19.8946 14.4804 20 14.7348 20 15C20 15.2652 19.8946 15.5196 19.7071 15.7071C19.5196 15.8946 19.2652 16 19 16H18V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V12C16 11.7348 16.1054 11.4804 16.2929 11.2929C16.4804 11.1054 16.7348 11 17 11H19C19.2652 11 19.5196 11.1054 19.7071 11.2929C19.8946 11.4804 20 11.7348 20 12C20 12.2652 19.8946 12.5196 19.7071 12.7071C19.5196 12.8946 19.2652 13 19 13H18V14H19Z"
                                        fill="white" />
                                </svg>
                                Export Data
                            </a>
                            {{-- end button export --}}
                        </div>
                        {{-- end caption table --}}

                        {{-- bagian tabel paket --}}
                        <div class="overflow-x-auto shadow mt-3">
                            {{-- Tabel outlet --}}
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col"
                                            class=" px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Nama Outlet
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Jenis Paket
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Nama Paket
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Harga Paket
                                        </th>
                                        <th scope="col"
                                            class="px-6 py-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($pakets as $paket)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50">
                                            {{-- nama outlet --}}
                                            <th scope="row"
                                                class="flex items-center py-3 text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="pl-4 mr-2 text-left">
                                                    <div class="text-base font-semibold">{{ $paket->outlet->nama }}</div>
                                                    <div class="font-normal text-gray-500">{{ $paket->outlet->alamat }}
                                                    </div>
                                                </div>
                                            </th>
                                            {{-- jenis paket --}}
                                            <td
                                                class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">
                                                {{ $paket->jenis }}
                                            </td>
                                            {{-- nama paket --}}
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $paket->nama_paket }}
                                            </td>
                                            {{-- harga paket --}}
                                            <td
                                                class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <div class="flex items-center gap-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M13.146 6.68799C13.954 6.86819 14.6857 7.29608 15.239 7.91199C15.3243 8.01193 15.4285 8.09407 15.5456 8.15374C15.6627 8.2134 15.7905 8.24941 15.9215 8.25972C16.0525 8.27003 16.1843 8.25443 16.3093 8.21381C16.4343 8.17319 16.55 8.10835 16.65 8.02299C16.7499 7.93763 16.832 7.83343 16.8917 7.71632C16.9514 7.59921 16.9874 7.4715 16.9977 7.34048C17.008 7.20946 16.9924 7.07769 16.9518 6.95269C16.9112 6.8277 16.8463 6.71193 16.761 6.61199C15.9341 5.67739 14.836 5.02434 13.62 4.74399C13.412 4.69399 13.207 4.67599 13 4.64399V3.41699C13 3.15178 12.8946 2.89742 12.7071 2.70989C12.5195 2.52235 12.2652 2.41699 12 2.41699C11.7347 2.41699 11.4804 2.52235 11.2929 2.70989C11.1053 2.89742 11 3.15178 11 3.41699V4.67399C10.1557 4.77321 9.35685 5.10953 8.69584 5.644C8.03483 6.17847 7.53873 6.88923 7.26496 7.69399C7.13975 8.17068 7.11376 8.66799 7.18858 9.15513C7.26341 9.64227 7.43746 10.1089 7.69996 10.526C8.59747 11.9362 10.017 12.9336 11.648 13.3C12.7528 13.5399 13.7211 14.2001 14.348 15.141C14.4705 15.3287 14.5543 15.5389 14.5947 15.7593C14.635 15.9798 14.631 16.2061 14.583 16.425C14.231 17.698 12.423 18.403 10.629 17.967C9.81274 17.7855 9.07486 17.3504 8.52096 16.724C8.43672 16.6232 8.33345 16.54 8.21705 16.4791C8.10065 16.4182 7.9734 16.3809 7.84256 16.3692C7.57832 16.3455 7.31552 16.4279 7.11196 16.598C6.90841 16.7681 6.78078 17.0122 6.75715 17.2764C6.74545 17.4072 6.75963 17.5391 6.79889 17.6645C6.83815 17.7898 6.90172 17.9062 6.98596 18.007C7.81453 18.9598 8.92413 19.6251 10.155 19.907C10.4344 19.974 10.7181 20.0225 11.004 20.052V20.916C11.004 21.1812 11.1093 21.4356 11.2969 21.6231C11.4844 21.8106 11.7387 21.916 12.004 21.916C12.2692 21.916 12.5235 21.8106 12.7111 21.6231C12.8986 21.4356 13.004 21.1812 13.004 20.916V19.94C13.8048 19.8091 14.5547 19.462 15.1728 18.9361C15.7908 18.4102 16.2535 17.7256 16.511 16.956C16.6351 16.4794 16.6603 15.9824 16.5849 15.4956C16.5096 15.0089 16.3354 14.5428 16.073 14.126C15.1748 12.7175 13.7565 11.7208 12.127 11.353C11.0224 11.1131 10.0542 10.4533 9.42696 9.51299C9.30459 9.32506 9.2208 9.11469 9.18045 8.89409C9.14011 8.67349 9.14402 8.44707 9.19196 8.22799C9.54496 6.95699 11.356 6.25199 13.146 6.68799Z"
                                                            fill="#2F2F38" />
                                                    </svg>
                                                    {{ $paket->harga }}
                                                </div>
                                            </td>
                                            {{-- actions --}}
                                            <td class="p-4 space-x-2 whitespace-nowrap">
                                                {{-- button delete --}}
                                                <button type="button"
                                                    class="py-2.5 px-5 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                    Preview
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- end bagian teble paket --}}
                    </div>

                    {{-- tab member --}}
                    <div class="hidden p-4 rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel"
                        aria-labelledby="contacts-tab">

                        {{-- caption table member --}}
                        <div class="flex flex-wrap gap-4 sm:flex-row justify-center items-center">
                            <div class="flex-1 items-center">
                                <caption class="p-3 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                                    <p class="text-xl font-semibold"> Data Member</p>
                                    <p class="mt-2 mb-3 text-base font-normal text-gray-500 dark:text-gray-400">Manage all
                                        your existing member or add a new one</p>
                                </caption>
                            </div>
                            {{-- button export data --}}
                            <a type="button" href="{{ route('pengguna.tambah') }}"
                                class="inline-flex gap-3 items-center px-4 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 20 20" fill="none">
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
                                        d="M21 9H20V4C20.0083 3.47862 19.8094 2.97524 19.4471 2.6003C19.0847 2.22536 18.5884 2.00947 18.067 2H11V7C11 7.53043 10.7893 8.03914 10.4142 8.41421C10.0391 8.78929 9.53043 9 9 9H3C2.73478 9 2.48043 9.10536 2.29289 9.29289C2.10536 9.48043 2 9.73478 2 10V19C2 19.2652 2.10536 19.5196 2.29289 19.7071C2.48043 19.8946 2.73478 20 3 20H4C3.9917 20.5214 4.19056 21.0248 4.55294 21.3997C4.91533 21.7746 5.41164 21.9905 5.933 22H18.067C19.167 22 19.767 20.764 19.923 20.386C19.9719 20.2633 19.9957 20.1321 19.993 20H21C21.2652 20 21.5196 19.8946 21.7071 19.7071C21.8946 19.5196 22 19.2652 22 19V10C22 9.73478 21.8946 9.48043 21.7071 9.29289C21.5196 9.10536 21.2652 9 21 9ZM6.5 16H6V17C6 17.2652 5.89464 17.5196 5.70711 17.7071C5.51957 17.8946 5.26522 18 5 18C4.73478 18 4.48043 17.8946 4.29289 17.7071C4.10536 17.5196 4 17.2652 4 17V12C4 11.7348 4.10536 11.4804 4.29289 11.2929C4.48043 11.1054 4.73478 11 5 11H6.5C7.16304 11 7.79893 11.2634 8.26777 11.7322C8.73661 12.2011 9 12.837 9 13.5C9 14.163 8.73661 14.7989 8.26777 15.2678C7.79893 15.7366 7.16304 16 6.5 16ZM15 15.375C14.9989 16.0709 14.722 16.7379 14.23 17.23C13.7379 17.722 13.0709 17.9989 12.375 18H11C10.7348 18 10.4804 17.8946 10.2929 17.7071C10.1054 17.5196 10 17.2652 10 17V12C10 11.7348 10.1054 11.4804 10.2929 11.2929C10.4804 11.1054 10.7348 11 11 11H12.375C13.0709 11.0011 13.7379 11.278 14.23 11.77C14.722 12.2621 14.9989 12.9291 15 13.625V15.375ZM19 14C19.2652 14 19.5196 14.1054 19.7071 14.2929C19.8946 14.4804 20 14.7348 20 15C20 15.2652 19.8946 15.5196 19.7071 15.7071C19.5196 15.8946 19.2652 16 19 16H18V17C18 17.2652 17.8946 17.5196 17.7071 17.7071C17.5196 17.8946 17.2652 18 17 18C16.7348 18 16.4804 17.8946 16.2929 17.7071C16.1054 17.5196 16 17.2652 16 17V12C16 11.7348 16.1054 11.4804 16.2929 11.2929C16.4804 11.1054 16.7348 11 17 11H19C19.2652 11 19.5196 11.1054 19.7071 11.2929C19.8946 11.4804 20 11.7348 20 12C20 12.2652 19.8946 12.5196 19.7071 12.7071C19.5196 12.8946 19.2652 13 19 13H18V14H19Z"
                                        fill="white" />
                                </svg>
                                Export Data
                            </a>
                            {{-- end button export --}}
                        </div>
                        {{-- end caption table --}}

                        {{-- bagian tabel paket --}}
                        <div class="overflow-x-auto shadow mt-3">
                            {{-- Tabel outlet --}}
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead
                                    class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="p-4">
                                            <div class="flex items-center">
                                                <input id="checkbox-all-search" type="checkbox"
                                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama Member
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Alamat
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jenis Kelamin
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nomor Telepon
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Status Member
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Jumlah Transaksi
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($members as $member)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td class="w-4 p-4">
                                                {{-- check-box --}}
                                                <div class="flex items-center">
                                                    <input id="checkbox-table-search-1" type="checkbox"
                                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                                </div>
                                            </td>
                                            {{-- nama --}}
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $member->nama }}
                                            </th>
                                            {{-- alamat --}}
                                            <td class="px-6 py-4">
                                                {{ $member->alamat }}
                                            </td>
                                            {{-- jenis-kelamin --}}
                                            <td class="px-6 py-4">
                                                {{ $member->jenis_kelamin }}
                                            </td>
                                            {{-- telepon --}}
                                            <td class="px-6 py-4">
                                                {{ $member->telepon }}
                                            </td>
                                            {{-- status member --}}
                                            @if($member->status === 'Member')
                                            <td class="px-6 py-4">
                                                <div class="flex items-center justify-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                                        <path d="M17.6597 8.23264L16.9113 7.48347C16.753 7.32597 16.6663 7.11597 16.6663 6.89347V5.83347C16.6663 4.45514 15.5447 3.33347 14.1663 3.33347H13.1063C12.8872 3.33347 12.6722 3.2443 12.5172 3.0893L11.768 2.34014C10.793 1.36514 9.20801 1.36514 8.23301 2.34014L7.48218 3.0893C7.32718 3.2443 7.11218 3.33347 6.89301 3.33347H5.83301C4.45468 3.33347 3.33301 4.45514 3.33301 5.83347V6.89347C3.33301 7.11597 3.24634 7.32597 3.08884 7.48347L2.33968 8.2318C1.86718 8.7043 1.60718 9.33264 1.60718 10.0001C1.60718 10.6676 1.86801 11.296 2.33968 11.7676L3.08801 12.5168C3.24634 12.6743 3.33301 12.8843 3.33301 13.1068V14.1668C3.33301 15.5451 4.45468 16.6668 5.83301 16.6668H6.89301C7.11218 16.6668 7.32718 16.756 7.48218 16.911L8.23134 17.661C8.71884 18.1476 9.35884 18.391 9.99884 18.391C10.6388 18.391 11.2788 18.1476 11.7663 17.6601L12.5155 16.911C12.6722 16.756 12.8872 16.6668 13.1063 16.6668H14.1663C15.5447 16.6668 16.6663 15.5451 16.6663 14.1668V13.1068C16.6663 12.8843 16.753 12.6743 16.9113 12.5168L17.6597 11.7685C18.1313 11.296 18.3922 10.6685 18.3922 10.0001C18.3922 9.3318 18.1322 8.7043 17.6597 8.23264ZM13.7955 9.0268L8.79551 12.3601C8.65468 12.4543 8.49301 12.5001 8.33301 12.5001C8.11801 12.5001 7.90468 12.4168 7.74384 12.256L6.07718 10.5893C5.75134 10.2635 5.75134 9.7368 6.07718 9.41097C6.40301 9.08514 6.92968 9.08514 7.25551 9.41097L8.43884 10.5943L12.8705 7.64014C13.2547 7.3843 13.7713 7.48764 14.0263 7.87097C14.2822 8.2543 14.1788 8.7718 13.7955 9.0268Z" fill="#007FFF"/>
                                                        </svg>
                                                <div class="font-normal text-gray-500">{{ $member->status }}
                                                </div>
                                            </td>
                                            @else
                                            <td class="px-6 py-4">
                                                <div class="flex items-center justify-center gap-1">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"></div>
                                                <div class="font-normal text-gray-500">{{ $member->status }}
                                                </div>
                                            </td>
                                            @endif
                                            {{-- jumlah transaksi --}}
                                            <td class="px-6 py-4">
                                                {{ $member->transaksi_count}}
                                            </td>
                                            {{-- actions --}}
                                            <td class="p-4 space-x-2 whitespace-nowrap">
                                                {{-- button delete --}}
                                                <button type="button"
                                                    class="py-2.5 px-5 flex items-center text-sm font-medium text-center text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24"
                                                        fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                        <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                    </svg>
                                                    Preview
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- end bagian teble paket --}}
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
