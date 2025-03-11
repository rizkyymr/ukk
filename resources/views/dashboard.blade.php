@extends('layout.header')
@section('main')
    <div class="mx-auto px-4">
        @if (Auth::check())
            <P class="text-6xl m-10 font-thin">WELCOME BACK!, <b>{{ auth::user()->name }}</b></P> 
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">
            <!-- Card Total Transaksi -->
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm">TOTAL TRANSAKSI</h3>
                        <p class="text-3xl font-bold">{{ $transaksi->count() }}</p>
                    </div>
                    <div class="bg-blue-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card Transaksi Lunas -->
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm">TRANSAKSI LUNAS</h3>
                        <p class="text-3xl font-bold">{{ $transaksi->where('status', 'LUNAS')->count() }}</p>
                    </div>
                    <div class="bg-green-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Card Transaksi Belum Lunas -->
            <div class="bg-white rounded-lg shadow-lg p-6 transform hover:scale-105 transition-transform duration-200">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-gray-500 text-sm">BELUM LUNAS</h3>
                        <p class="text-3xl font-bold">{{ $transaksi->where('status', 'BELUM LUNAS')->count() }}</p>
                    </div>
                    <div class="bg-red-500 rounded-full p-3">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabel Transaksi Terbaru -->
        <div class="bg-white rounded-lg shadow-lg max-w-6xl mx-auto my-8">
            <h2 class="text-xl font-bold p-6 border-b">TRANSAKSI TERBARU</h2>
            <div class="overflow-x-auto p-6">
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-left">PEMINJAM</th>
                            <th class="px-4 py-2 text-left">SEPEDA</th>
                            <th class="px-4 py-2 text-left">TANGGAL SEWA</th>
                            <th class="px-4 py-2 text-left">STATUS</th>
                            <th class="px-4 py-2 text-left">TOTAL</th>
                            <th class="px-4 py-2 text-left">DENDA</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi->take(5) as $t)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $t->peminjam->nama }}</td>
                            <td class="px-4 py-2">{{ $t->sepeda->merk }}</td>
                            <td class="px-4 py-2">{{ date('d/m/Y', strtotime($t->tgl_pinjam)) }}</td>
                            <td class="px-4 py-2">
                                <span class="px-2 py-1 rounded-full text-xs 
                                    {{ $t->status == 'LUNAS' ? 'bg-green-100 text-green-800' : 
                                    ($t->status == 'PROSES' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $t->status }}
                                </span>
                            </td>
                            <td class="px-4 py-2">Rp. {{ number_format($t->bayar, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">Rp. {{ number_format($t->denda, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection