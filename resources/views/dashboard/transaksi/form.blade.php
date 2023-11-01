@extends('layouts.app')

@section('style')
    <style>
        #step-content {
            display: none;
        }
    </style>
@endsection

@section('contents')
    <div class="p-4 sm:ml-64">
        <div class="border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-20">

            <form
                action="{{ isset($transaksi) ? route('transaksi.tambah.update', $transaksi->id) : route('transaksi.tambah.simpan') }}"
                method="POST">
                @csrf

                {{-- step 1 data transaksi --}}
                <div class="step-content" id="step-content-1" data-step="1">
                    {{-- Bagian Captio atau judul form --}}
                    <div class="mt-5">
                        <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            <p class="text-2xl font-semibold">Data Pelanggan</p>
                            <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Input data
                                mengenai kode transaksi, outlet, member, dan paket.</p>
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
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                            </button>
                        </div>
                    @endif
                    {{-- end bgaian alert --}}
                    <div class="sm:col-span-2">
                        <label for="kode_invoice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode
                            Invoice</label>
                        <input type="text" name="kode_invoice" id="kode_invoice"
                            class=" block w-full p-2.5 inline-flex items-center py-4 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex text-2xl font-semibold"
                            required value="{{ isset($transaksi) ? $transaksi->kode_invoice : $kodeInvoice }}"
                            readonly>
                    </div>
                    <div class="mb-4 mt-5 flex-wrap w-full">
                        <div class="mb-4">
                            <label for="outlet" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Outlet</label>
                            <select id="outlet"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="id_outlet" required>
                                <option value="" disabled selected>Select Outlet</option>
                                @foreach ($outlets as $outlet)
                                    <option value="{{ $outlet->id }}"
                                        {{ isset($transaksi) && $outlet->id == $transaksi->id_outlet ? 'selected' : '' }}>
                                        {{ $outlet->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="member" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Member</label>
                            <select id="member"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="id_member" required>
                                <option value="" disabled selected>Select Member</option>
                                @foreach ($members as $member)
                                    <option value="{{ $member->id }}"
                                        {{ isset($transaksi) && $member->id == $transaksi->id_member ? 'selected' : '' }}>
                                        {{ $member->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="paket" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Paket</label>
                            <select id="paket"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                name="id_paket" required>
                                <option value="" disabled selected>Select Paket</option>
                                @foreach ($pakets as $paket)
                                    <option value="{{ $paket->id }}"
                                        {{ isset($detail) && $paket->id == $detail->id_paket ? 'selected' : '' }}>
                                        {{ $paket->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- button --}}
                        <div class="flex mt-7 gap-3">
                            <a type="button" href="{{ route('transaksi') }}"
                                class="inline-flex items-center text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-6 py-2.5 text-center shadow-lg shadow-red-600/50 dark:shadow-lg dark:shadow-red-800/80">
                                Cancel
                            </a>

                            <button type="button" data-step="2"
                                class="next-step inline-flex items-center px-6 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                Next Step
                            </button>
                        </div>
                    </div>
                </div>
                {{-- end step 1 --}}

                {{-- step 2 payment detail --}}
                <div class="step-content" id="step-content-2" data-step="2">
                    {{-- Bagian Captio atau judul form --}}
                    <div class="mt-5">
                        <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            <p class="text-2xl font-semibold">Data Transaksi</p>
                            <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Input data tangga
                                transaksi, tanggal bayar, diskon, qty, dll.</p>
                        </caption>
                    </div>
                    {{-- End bagian captiomn --}}
                    <div class="mb-4 mt-5 flex-wrap w-full">
                        <div class="grid gap-4 mb-4 sm:grid-cols-2">
                            <div>
                                <label for="category"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Transaksi</label>
                                <input type="date" name="tanggal" id="item-weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="12" required
                                    value="{{ isset($transaksi) ? $transaksi->tanggal : $todays }}">
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Batas Waktu</label>
                                <input type="date" name="batas_waktu" id="item-weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="12" required
                                    value="{{ isset($transaksi) ? $transaksi->batas_waktu : '' }}">
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Bayar</label>
                                <input type="date" id="item-weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    name="tanggal_bayar" placeholder="12" 
                                    value="{{ isset($transaksi) ? $transaksi->tanggal_bayar : '' }}">
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Biaya
                                    Tambahan</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="12" name="biaya_tambahan"
                                    value="{{ isset($transaksi) ? $transaksi->biaya_tambahan : ''}}">
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Diskon</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="12" name="diskon"
                                    value="{{ isset($transaksi) ? $transaksi->diskon : '' }}">
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pajak</label>
                                <input type="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="12" name="pajak"
                                    value="{{ isset($transaksi) ? $transaksi->pajak : '' }}">
                            </div>
                            <div>
                                <label for="item-weight"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Qty</label>
                                <input type="number" name="qty" id="item-weight"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="12" required name="qty"
                                    value="{{ isset($detail) ? $detail->qty : '' }}">
                            </div>
                        </div>

                        {{-- button --}}
                        <div class="flex items-center justify-start gap-3 mt-7">
                            <button type="button" data-step="1"
                                class="prev-step inline-flex items-center px-6 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                Previous
                            </button>
                            <button type="button" data-step="3"
                                class="next-step inline-flex items-center px-6 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                Next Step
                            </button>
                        </div>
                    </div>
                </div>
                {{-- end step 2 --}}

                {{-- step 3 bagian detail transaksi --}}
                <div class="step-content" id="step-content-3" data-step="3">
                    {{-- Bagian Captio atau judul form --}}
                    <div class="mt-5">
                        <caption class="p-5 text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
                            <p class="text-2xl font-semibold">Data Detail Transaksi</p>
                            <p class="mt-2 mb-7 text-medium font-normal text-gray-500 dark:text-gray-400">Input data
                                keterangan, status transaksi dan status bayar.</p>
                        </caption>
                    </div>
                    {{-- End bagian captiomn --}}
                    <div class="mb-4 mt-5 flex-wrap w-full">

                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Keterangan</label>
                                <textarea id="description" rows="8"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Keterangan transaksi.." name="keterangan" required>{{ isset($detail) ? $detail->keterangan : '' }}</textarea>
                            </div>
                            <div class="w-full">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status</label>
                                <select id="outlet"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="status" required>
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="Proses"
                                        {{ isset($transaksi) && $transaksi->status == 'Proses' ? 'selected' : '' }}>
                                        Proses</option>
                                    <option value="Selesai"
                                        {{ isset($transaksi) && $transaksi->status == 'Selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                            </div>
                            <div class="w-full">
                                <label for="price"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Status
                                    Bayar</label>
                                <select id="outlet"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    name="status_bayar" required>
                                    <option value="" disabled selected>Select Status Bayar</option>
                                    <option value="Dibayar"
                                        {{ isset($transaksi) && $transaksi->status_bayar == 'Dibayar' ? 'selected' : '' }}>
                                        Dibayar</option>
                                    <option value="Belum Bayar"
                                        {{ isset($transaksi) && $transaksi->status_bayar == 'Belum Bayar' ? 'selected' : '' }}>
                                        Belum Bayar</option>
                                </select>
                            </div>
                        </div>

                        {{-- button --}}
                        <div class="flex items-center justify-start gap-3 mt-7">
                            <button type="button" data-step="2"
                                class="prev-step inline-flex items-center px-6 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                Previous
                            </button>
                            <button type="submit"
                                class="next-step inline-flex items-center px-6 py-2.5 text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-s minline-flex">
                                {{ isset($transaksi) ? 'Update Data' : 'Create Data' }}
                            </button>
                        </div>
                    </div>
                </div>
                {{-- end step 3 --}}
            </form>

        </div>
    </div>
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const formSections = document.querySelectorAll(".step-content");
            const prevButtons = document.querySelectorAll(".prev-step");
            const nextButtons = document.querySelectorAll(".next-step");

            // Menampilkan langkah awal saat halaman dimuat
            showStep(1);

            nextButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const step = this.getAttribute("data-step");
                    showStep(step);
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener("click", function() {
                    const step = this.getAttribute("data-step");
                    showStep(step);
                });
            });

            function showStep(step) {
                formSections.forEach(section => {
                    section.style.display = "none";
                });

                const currentSection = document.querySelector(`#step-content-${step}`);
                if (currentSection) {
                    currentSection.style.display = "block";
                }
            }
        });
    </script>
@endsection
