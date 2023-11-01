<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
        <ul class="space-y-2 font-medium">
            <li class="mt-4">
                <a href="{{ route('dashboard') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group">
                    <svg class="w-4 h-4 mr-2 text-blue-600 dark:text-primary-700" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 18">
                        <path d="M6.143 0H1.857A1.857 1.857 0 0 0 0 1.857v4.286C0 7.169.831 8 1.857 8h4.286A1.857 1.857 0 0 0 8 6.143V1.857A1.857 1.857 0 0 0 6.143 0Zm10 0h-4.286A1.857 1.857 0 0 0 10 1.857v4.286C10 7.169 10.831 8 11.857 8h4.286A1.857 1.857 0 0 0 18 6.143V1.857A1.857 1.857 0 0 0 16.143 0Zm-10 10H1.857A1.857 1.857 0 0 0 0 11.857v4.286C0 17.169.831 18 1.857 18h4.286A1.857 1.857 0 0 0 8 16.143v-4.286A1.857 1.857 0 0 0 6.143 10Zm10 0h-4.286A1.857 1.857 0 0 0 10 11.857v4.286c0 1.026.831 1.857 1.857 1.857h4.286A1.857 1.857 0 0 0 18 16.143v-4.286A1.857 1.857 0 0 0 16.143 10Z"/>
                    </svg>
                    <span class="ml-2">Dashboard</span>
                </a>
            </li>

            @if(Auth::user()->role === 'Administrator')
            <li>
                <a href="{{ route('pengguna') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" class="text-blue-700"
                        fill="none">
                        <path
                            d="M16.5 2C15.7815 2.0022 15.077 2.1985 14.4609 2.56816C13.8448 2.93781 13.34 3.46708 13 4.1C14.2939 4.35983 15.4316 5.12292 16.163 6.22146C16.8943 7.31999 17.1594 8.66403 16.9 9.958C17.9183 9.85564 18.8584 9.36579 19.5256 8.58976C20.1929 7.81374 20.5364 6.81092 20.485 5.78875C20.4336 4.76658 19.9913 3.80326 19.2496 3.09806C18.5079 2.39286 17.5235 1.99973 16.5 2Z"
                            fill="#2F2F38" />
                        <path
                            d="M11 15H13C14.0609 15 15.0783 15.4214 15.8284 16.1716C16.5786 16.9217 17 17.9391 17 19V21H7V19C7 17.9391 7.42143 16.9217 8.17157 16.1716C8.92172 15.4214 9.93913 15 11 15Z"
                            fill="#2F2F38" />
                        <path
                            d="M7 21H17V19C17 17.9391 16.5786 16.9217 15.8284 16.1716C15.0783 15.4214 14.0609 15 13 15H11C9.93913 15 8.92172 15.4214 8.17157 16.1716C7.42143 16.9217 7 17.9391 7 19V21Z"
                            fill="#2F2F38" />
                        <path
                            d="M7 9C7.00127 7.84775 7.39983 6.73117 8.12849 5.83857C8.85715 4.94596 9.87133 4.33192 11 4.1C10.6737 3.49363 10.1959 2.98209 9.61315 2.61518C9.03043 2.24828 8.36263 2.03851 7.67478 2.00631C6.98692 1.97411 6.30245 2.12056 5.688 2.43141C5.07354 2.74227 4.55005 3.20693 4.16849 3.78016C3.78692 4.35338 3.56028 5.01565 3.51065 5.70246C3.46101 6.38928 3.59005 7.07725 3.88522 7.69939C4.18039 8.32153 4.63163 8.85664 5.19499 9.25262C5.75836 9.6486 6.41466 9.89196 7.1 9.959C7.03569 9.64333 7.0022 9.32215 7 9Z"
                            fill="#2F2F38" />
                        <path
                            d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z"
                            fill="#2F2F38" />
                        <path
                            d="M17 11H16.576C16.1678 11.9223 15.491 12.7002 14.634 13.232C15.8896 13.5886 16.9949 14.3444 17.7826 15.3851C18.5704 16.4258 18.9977 17.6948 19 19H21C21.2652 19 21.5196 18.8946 21.7071 18.7071C21.8946 18.5196 22 18.2652 22 18V16C21.9984 14.6744 21.4711 13.4036 20.5338 12.4662C19.5964 11.5289 18.3256 11.0016 17 11Z"
                            fill="#2F2F38" />
                        <path
                            d="M7.424 11H7C5.67441 11.0016 4.40356 11.5289 3.46622 12.4662C2.52888 13.4036 2.00159 14.6744 2 16V18C2 18.2652 2.10536 18.5196 2.29289 18.7071C2.48043 18.8946 2.73478 19 3 19H5C5.00228 17.6948 5.42963 16.4258 6.21738 15.3851C7.00513 14.3444 8.11042 13.5886 9.366 13.232C8.50898 12.7002 7.8322 11.9223 7.424 11Z"
                            fill="#2F2F38" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->role === 'Administrator')
            <li>
                <a href="{{ route('outlet') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                        fill="none">
                        <path
                            d="M17.876 0.517C17.7896 0.360341 17.6627 0.229734 17.5086 0.1388C17.3546 0.0478647 17.1789 -6.78346e-05 17 8.19381e-08H3C2.82283 -7.16276e-05 2.64883 0.0469263 2.49579 0.136185C2.34275 0.225444 2.21617 0.353759 2.129 0.508C1.63 1.393 0 5.385 0 6.75C0.000436187 7.1867 0.089259 7.6188 0.261118 8.02026C0.432978 8.42172 0.684318 8.78425 1 9.086V19C1 19.2652 1.10536 19.5196 1.29289 19.7071C1.48043 19.8946 1.73478 20 2 20H4C4.26522 20 4.51957 19.8946 4.70711 19.7071C4.89464 19.5196 5 19.2652 5 19V13H9V19C9 19.2652 9.10536 19.5196 9.29289 19.7071C9.48043 19.8946 9.73478 20 10 20H18C18.2652 20 18.5196 19.8946 18.7071 19.7071C18.8946 19.5196 19 19.2652 19 19V9.044C19.3104 8.74695 19.5586 8.39119 19.7303 7.99738C19.9019 7.60356 19.9936 7.17956 20 6.75C20 5.467 18.374 1.42 17.876 0.517ZM15.5 14.7C15.5 14.9122 15.4157 15.1157 15.2657 15.2657C15.1157 15.4157 14.9122 15.5 14.7 15.5H12.3C12.0878 15.5 11.8843 15.4157 11.7343 15.2657C11.5843 15.1157 11.5 14.9122 11.5 14.7V12.3C11.5 12.0878 11.5843 11.8843 11.7343 11.7343C11.8843 11.5843 12.0878 11.5 12.3 11.5H14.7C14.9122 11.5 15.1157 11.5843 15.2657 11.7343C15.4157 11.8843 15.5 12.0878 15.5 12.3V14.7ZM16.75 8C16.4186 7.99947 16.101 7.8676 15.8667 7.6333C15.6324 7.39899 15.5005 7.08136 15.5 6.75C15.5 6.48478 15.3946 6.23043 15.2071 6.04289C15.0196 5.85536 14.7652 5.75 14.5 5.75C14.2348 5.75 13.9804 5.85536 13.7929 6.04289C13.6054 6.23043 13.5 6.48478 13.5 6.75C13.5 7.08152 13.3683 7.39946 13.1339 7.63388C12.8995 7.8683 12.5815 8 12.25 8C11.9185 8 11.6005 7.8683 11.3661 7.63388C11.1317 7.39946 11 7.08152 11 6.75C11 6.48478 10.8946 6.23043 10.7071 6.04289C10.5196 5.85536 10.2652 5.75 10 5.75C9.73478 5.75 9.48043 5.85536 9.29289 6.04289C9.10536 6.23043 9 6.48478 9 6.75C9 7.08152 8.8683 7.39946 8.63388 7.63388C8.39946 7.8683 8.08152 8 7.75 8C7.41848 8 7.10054 7.8683 6.86612 7.63388C6.6317 7.39946 6.5 7.08152 6.5 6.75C6.5 6.48478 6.39464 6.23043 6.20711 6.04289C6.01957 5.85536 5.76522 5.75 5.5 5.75C5.23478 5.75 4.98043 5.85536 4.79289 6.04289C4.60536 6.23043 4.5 6.48478 4.5 6.75C4.49947 7.08136 4.36761 7.39899 4.1333 7.6333C3.89899 7.8676 3.58136 7.99947 3.25 8C2.91977 7.99585 2.60423 7.86282 2.3707 7.6293C2.13718 7.39577 2.00415 7.08023 2 6.75C2.30575 5.10009 2.84129 3.5012 3.591 2H16.4C17.1406 3.50581 17.6786 5.10301 18 6.75C17.9795 7.07479 17.8412 7.38094 17.6111 7.61106C17.3809 7.84118 17.0748 7.97947 16.75 8Z"
                            fill="#2F2F38" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Outlet</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->role === 'Administrator')
            <li>
                <a href="{{ route('paket') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                        <path
                            d="M14 2a3.963 3.963 0 0 0-1.4.267 6.439 6.439 0 0 1-1.331 6.638A4 4 0 1 0 14 2Zm1 9h-1.264A6.957 6.957 0 0 1 15 15v2a2.97 2.97 0 0 1-.184 1H19a1 1 0 0 0 1-1v-1a5.006 5.006 0 0 0-5-5ZM6.5 9a4.5 4.5 0 1 0 0-9 4.5 4.5 0 0 0 0 9ZM8 10H5a5.006 5.006 0 0 0-5 5v2a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-2a5.006 5.006 0 0 0-5-5Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Paket</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->role === 'Administrator' || Auth::user()->role === 'Kasir')
            <li>
                <a href="{{ route('member') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                        <path
                            d="M17 5.923A1 1 0 0 0 16 5h-3V4a4 4 0 1 0-8 0v1H2a1 1 0 0 0-1 .923L.086 17.846A2 2 0 0 0 2.08 20h13.84a2 2 0 0 0 1.994-2.153L17 5.923ZM7 9a1 1 0 0 1-2 0V7h2v2Zm0-5a2 2 0 1 1 4 0v1H7V4Zm6 5a1 1 0 1 1-2 0V7h2v2Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Member</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->role === 'Administrator' || Auth::user()->role === 'Kasir')
            <li>
                <a href="{{ route('transaksi') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Transaksi</span>
                </a>
            </li>
            @endif

            @if(Auth::user()->role === 'Administrator' || Auth::user()->role === 'Owner' || Auth::user()->role === 'Kasir')
            <li>
                <a href="{{ route('laporan') }}"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Laporan</span>
                </a>
            </li>
            @endif

            {{-- @if(Auth::user()->role === 'Administrator' || Auth::user()->role === 'Kasir')
            <li>
                <a href="#"
                    class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                    <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M5 5V.13a2.96 2.96 0 0 0-1.293.749L.879 3.707A2.96 2.96 0 0 0 .13 5H5Z" />
                        <path
                            d="M6.737 11.061a2.961 2.961 0 0 1 .81-1.515l6.117-6.116A4.839 4.839 0 0 1 16 2.141V2a1.97 1.97 0 0 0-1.933-2H7v5a2 2 0 0 1-2 2H0v11a1.969 1.969 0 0 0 1.933 2h12.134A1.97 1.97 0 0 0 16 18v-3.093l-1.546 1.546c-.413.413-.94.695-1.513.81l-3.4.679a2.947 2.947 0 0 1-1.85-.227 2.96 2.96 0 0 1-1.635-3.257l.681-3.397Z" />
                        <path
                            d="M8.961 16a.93.93 0 0 0 .189-.019l3.4-.679a.961.961 0 0 0 .49-.263l6.118-6.117a2.884 2.884 0 0 0-4.079-4.078l-6.117 6.117a.96.96 0 0 0-.263.491l-.679 3.4A.961.961 0 0 0 8.961 16Zm7.477-9.8a.958.958 0 0 1 .68-.281.961.961 0 0 1 .682 1.644l-.315.315-1.36-1.36.313-.318Zm-5.911 5.911 4.236-4.236 1.359 1.359-4.236 4.237-1.7.339.341-1.699Z" />
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                    <span
                        class="inline-flex items-center justify-center w-3 h-3 p-3 ml-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span>
                </a>
            </li>
            @endif  --}}
        </ul>
    </div>
</aside>
