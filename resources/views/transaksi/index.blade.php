@extends('layout.header')
@section('main')
    <div class="container">
        <div class="mx-10 my-6">
            <h1 class="text-3xl font-semibold">
                DATA TRANSAKSI
            </h1>
        </div>

        <div class="mx-16">
            <a href="{{ route('transaksi.create') }}" class="bg-blue-400 hover:bg-blue-300 text-white px-4 py-2 rounded">
                CREATE
            </a>
        </div>

        <table class="mt-6 table w-screen border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">NO</th>
                    <th class="border border-gray-300 px-4 py-2">NAMA PEMINJAM</th>
                    <th class="border border-gray-300 px-4 py-2">MERK SEPEDA</th>
                    <th class="border border-gray-300 px-4 py-2">TANGGAL PINJAM</th>
                    <th class="border border-gray-300 px-4 py-2">TANGGAL PULANG</th>
                    <th class="border border-gray-300 px-4 py-2">TOTAL PEMBAYARAN</th>
                    <th class="border border-gray-300 px-4 py-2">DENDA</th>
                    <th class="border border-gray-300 px-4 py-2">JAMINAN</th>
                    <th class="border border-gray-300 px-4 py-2">STATUS</th>
                    <th class="border border-gray-300 px-4 py-2">ACTION</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($transaksi as $index => $transaksi)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->peminjam->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->sepeda->merk }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->tgl_pinjam }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->tgl_pulang }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($transaksi->bayar, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($transaksi->denda, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->jaminan }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $transaksi->status }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a 
                                    href="{{ route('transaksi.edit', $transaksi->id_transaksi) }}"
                                    class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded me-4">
                                    EDIT
                                </a>
                                <form action="{{ route('transaksi.destroy', $transaksi->id_transaksi) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-500 text-white rounded px-4 py-2">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">BELUM ADA DATA</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection