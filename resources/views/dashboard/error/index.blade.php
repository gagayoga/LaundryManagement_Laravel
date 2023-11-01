@extends('layouts.app')

@section('contents')
    <div class="p-4 sm:ml-64 ">
        <div class="p-4  border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-20">
            <div class="flex flex-col justify-center items-center px-6 mx-auto xl:px-0 dark:bg-gray-900">
                <div class="block md:max-w-lg">
                    <img src="{{ asset('images/error/404.svg') }}" alt="astronaut image">
                </div>
                <div class="text-center xl:max-w-4xl">
                    <h1 class="mb-3 text-2xl font-bold leading-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">
                        Menu not found</h1>
                    <p class="mb-5 text-base font-normal text-gray-500 md:text-lg dark:text-gray-400">Oops! Sorry menu <span class="text-md font-bold text-blue-600">{{ $query }}</span> yang anda cari tidak ditemukan. Coba ulangi lagi</p>
                    <a href="{{ route('dashboard') }}"
                        class="inline-flex items-center px-5 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                        <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd"></path>
                        </svg>
                        Go back dashboard
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
