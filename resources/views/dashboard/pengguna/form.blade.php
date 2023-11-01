@extends('layouts.app')

@section('contents')
    <div class="p-4 sm:ml-64">

        <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-20">

            {{-- Bagian form --}}
            {{-- Bagian Caption atau judul form --}}
            <div>
                {{-- bagian judul berdasarkan mode yang dipilih (tambah/edit) --}}
                <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                    <p class="text-2xl font-semibold">
                        {{ isset($user) ? 'Update Data User' : 'Tambah Data User' }}
                    </p>
                    <hr class="h-px my-5 bg-gray-200 border-0 dark:bg-gray-700">
                </caption>
            </div>
            {{-- End bagian captiomn --}}

            {{-- Bagian alert succes jika data berhasil di update atau di hapus --}}
            @if (session('errors'))
                <div id="alert-2"
                    class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium">
                        {{ session('errors') }}
                    </div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"
                        data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif
            {{-- end bgaian alert --}}

            {{-- bagian inputan --}}
            <form method="POST"
                action="{{ isset($user) ? route('pengguna.tambah.update', $user->id) : route('pengguna.tambah.simpan') }}" enctype="multipart/form-data">
                @csrf

                {{-- inputan name dan username --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-4">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Name</label>
                        <input type="text" id="name"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="input your name" name="nama" required
                            value="{{ isset($user) ? $user->nama : '' }}">
                    </div>
                    <div class="mb-4">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                            Email</label>
                        <input type="email" id="email"
                            class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                            placeholder="input your username" name="email" required
                            value="{{ isset($user) ? $user->email : '' }}">
                    </div>
                </div>
                {{-- end name and username --}}

                {{-- inputan password and confirm password --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    @if ($mode == 'edit')
                    @else
                        <div class="mb-4">
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                                password</label>
                            <input type="password" id="password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                name="password" placeholder="input your password">
                        </div>
                        <div class="mb-4">
                            <label for="repeat-password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Repeat password</label>
                            <input type="password" id="repeat-password"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                name="confirmpassword" placeholder="input repeat password" required>
                        </div>
                    @endif
                </div>
                {{-- end inputan password&confirm --}}

                {{-- inputan outlet dan role --}}
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="mb-4">
                        <label for="outlet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            your outlet</label>
                        <select id="outlet"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="id_outlet">
                            <option value="" disabled selected>Select Outlet</option>
                            @foreach ($outlets as $outlet)
                                <option value="{{ $outlet->id }}"
                                    {{ isset($user) && $outlet->id == $user->id_outlet ? 'selected' : '' }}>
                                    {{ $outlet->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select
                            your role</label>
                        <select id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="role">
                            <option value="" disabled selected>Select Role</option>
                            <option value="Administrator"
                                {{ isset($user) && $user->role == 'Administrator' ? 'selected' : '' }}>Administrator
                            </option>
                            <option value="Kasir" {{ isset($user) && $user->role == 'Kasir' ? 'selected' : '' }}>Kasir
                            </option>
                            <option value="Owner" {{ isset($user) && $user->role == 'Owner' ? 'selected' : '' }}>Owner
                            </option>
                        </select>
                    </div>
                </div>
                {{-- end --}}

                {{-- inputan image --}}
                <div class="mb-8">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload
                        Image</label>
                    <input
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-noe"
                        type="file" name="image" accept="image/**">
                    @if (isset($user) && $user->image)
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Current Image:
                        </div>
                        <img src="{{ asset('images/upload/' . $user->image) }}" alt="User Image"
                            class="rounded overflow-hidden" style="width: 250px; height: 250px; border-radius: 50%;">
                    @else
                        <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">A profile picture
                            is useful to confirm your are logged into your account</div>
                    @endif
                </div>
                {{-- end --}}

                {{-- button form --}}
                <div class="flex gap-3">
                    {{-- button submit --}}
                    <button type="submit"
                        class="inline-flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                        {{ isset($user) ? 'Update Data' : 'Create Data' }}
                    </button>

                    {{-- button cancel --}}
                    <a type="button" href="{{ route('pengguna') }}"
                        class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-6 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">Cancel</a>
                </div>
                {{-- end button form --}}
            </form>

        </div>

    </div>
@endsection
