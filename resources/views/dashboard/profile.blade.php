@extends('layouts.app')

@section('contents')
    <div class="pt-4 sm:ml-64">
        <div class="p-4  border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">


            <div class="grid grid-cols-1 px-1 pt-3 xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">

                <div class="mb-2 col-span-full">
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
                                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Profile
                                        User</span>
                                </div>
                            </li>
                        </ol>
                    </nav>
                </div>

                <div class="mb-4 col-span-full xl:mb-1">
                    <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">User Profile</h1>
                </div>

                <!-- Right Content -->
                <div class="col-span-full xl:col-auto">
                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <div class="items-center sm:flex xl:block 2xl:flex sm:space-x-4 xl:space-x-0 2xl:space-x-4">
                            <img class="mb-4 rounded-lg w-28 h-28 sm:mb-0 xl:mb-4 2xl:mb-0"
                                src="/images/upload/{{ $users->image }}" alt="Jese picture">
                            <div>
                                <h3 class="mb-1 text-xl font-bold text-gray-900 dark:text-white">{{ $users->nama }}</h3>
                                <div class="mb-4 text-sm text-gray-500 dark:text-gray-400">
                                    {{ $users->role }}
                                </div>
                                <div class="flex items-center space-x-2">
                                    <button type="file"
                                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                        <svg class="w-4 h-4 mr-2 -ml-1" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.5 13a3.5 3.5 0 01-.369-6.98 4 4 0 117.753-1.977A4.5 4.5 0 1113.5 13H11V9.413l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 001.414 1.414L9 9.414V13H5.5z">
                                            </path>
                                            <path d="M9 13h2v5a1 1 0 11-2 0v-5z"></path>
                                        </svg>
                                        Upload Image
                                    </button>
                                    <button type="button"
                                        class="py-2 px-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                                        Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div
                        class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                        <h3 class="mb-4 text-xl font-semibold dark:text-white">Update Password</h3>
                        <form action="{{ route('profile.update.password') }}" method="POST">
                            @csrf
                            @if (session('success'))
                            <div id="passwor-alert"
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
                                    data-dismiss-target="#passwor-alert" aria-label="Close">
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
                            <div class="grid grid-cols-6 gap-6">
                                <div class="col-span-6 sm:row-span-3">
                                    <label for="password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">New
                                        password</label>
                                    <input data-popover-target="popover-password" data-popover-placement="bottom"
                                        type="password" id="password"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="New Password" required name="password">
                                    <div data-popover id="popover-password" role="tooltip"
                                        class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                                        <div data-popper-arrow></div>
                                    </div>
                                </div>
                                <div class="col-span-6 sm:row-span-3">
                                    <label for="confirm-password"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirm
                                        password</label>
                                    <input type="password" name="confirm-password" id="confirm-password"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                        placeholder="Confirm Password" required>
                                    @if ($errors->any())
                                        <div>
                                                @foreach ($errors->all() as $error)
                                                <p id="filled_success_help" class="mt-2 text-xs text-red-600 dark:text-green-400">
                                                    {{ $error }}</p>
                                                @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="col-span-6 sm:col-full">
                                    <button
                                        class="text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                        type="submit">Save Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                {{-- Bagian Infromasi user --}}
                <div class="col-span-2">
                    <div class="p-4 mb-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2">
                        <h3 class="mb-4 text-xl font-semibold">General information</h3>
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

                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-6 gap-6">

                                {{-- inputan nama --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="nama"
                                        class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                                    <input type="text" name="nama" id="nama"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Nama" required value="{{ $users->nama }}">
                                </div>
                                {{-- end nama --}}

                                {{-- inputan username --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="username"
                                        class="block mb-2 text-sm font-medium text-gray-900">Username</label>
                                    <input type="text" name="username" id="username"
                                        class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5"
                                        placeholder="Username" required value="{{ $users->username }}">
                                </div>
                                {{-- end username --}}

                                {{-- inputan outlet --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="outlet"
                                        class="block mb-2 text-sm font-medium text-gray-900">Outlet</label>
                                    <select id="outlet"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        name="id_outlet">
                                        <option value="" disabled selected>Select Outlet</option>
                                        @foreach ($outlets as $outlet)
                                            <option value="{{ $outlet->id }}"
                                                {{ $outlet->id == $users->id_outlet ? 'selected' : '' }}>
                                                {{ $outlet->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- end outlet --}}

                                {{-- inputan role --}}
                                <div class="col-span-6 sm:col-span-3">
                                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 ">Role
                                        User</label>
                                    <select id="role"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                        name="role" disabled>
                                        <option value="" disabled selected>Select Role</option>
                                        <option value="Administrator"
                                            {{ $users->role == 'Administrator' ? 'selected' : '' }}>Administrator
                                        </option>
                                        <option value="Kasir" {{ $users->role == 'Kasir' ? 'selected' : '' }}>Kasir
                                        </option>
                                        <option value="Owner" {{ $users->role == 'Owner' ? 'selected' : '' }}>Owner
                                        </option>
                                    </select>
                                </div>
                                {{-- end role --}}

                                <div class="col-span-6 sm:col-full">
                                    <button
                                        class="text-white bg-primary-700 hover:bg-blue-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center"
                                        type="submit">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- end bagian informasi user --}}

            </div>

        </div>
    </div>
@endsection
