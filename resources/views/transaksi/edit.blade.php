@extends('layout.header')
@section('main')
    <div class="container-fluid flex flex-col">
        <div class="mx-10 my-6">
            <h1 class="text-3xl font-semibold text-start">
                FORM EDIT DATA TRANSAKSI
            </h1>
        </div>

        <div class="mx-10">
            <form action="{{ route('transaksi.update', $transaksi->id_transaksi) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <label for="nama" class="block">NAMA PEMINJAM</label>
                    <select name="id_peminjam" id="id_peminjam" class="border rounded p-2 w-full">
                        <option value="id_peminjam">NAMA PEMINJAM</option>
                        @foreach ($peminjam as $item)
                            <option value="{{ $item->id_peminjam }}" {{ $item->id_peminjam == $transaksi->id_peminjam ? 'selected' : '' }}>
                                {{ $item->nama }}
                            </option>
                        @endforeach
                    </select>
                    
                    <label for="merk" class="block">MERK SEPEDA</label>
                    <select name="id_sepeda" id="id_sepeda" class="border rounded p-2 w-full">
                        <option value="id_sepeda">MERK SEPEDA</option>
                        @foreach ($sepeda as $item)
                            <option value="{{ $item->id_sepeda }}" {{ $item->id_sepeda == $transaksi->id_sepeda ? 'selected' : '' }}>
                                {{ $item->merk }}
                            </option>
                        @endforeach
                    </select>

                    <label for="tgl_pinjam" class="block">TANGGAL SEWA</label>
                    <input type="date" class="border rounded p-2 w-full" name="tgl_pinjam" value="{{ $transaksi->tgl_pinjam }}">

                    <label for="tgl_pulang" class="block">TANGGAL KEMBALI</label>
                    <input type="date" class="border rounded p-2 w-full" name="tgl_pulang" value="{{ $transaksi->tgl_pulang }}">

                    <label for="bayar" class="block">TOTAL PEMBAYARAN</label>
                    <input type="input" class="border rounded p-2 w-full" name="bayar" value="{{ $transaksi->bayar }}">

                    <label for="denda" class="block">DENDA</label>
                    <input type="input" class="border rounded p-2 w-full" name="denda" value="{{ $transaksi->denda }}">

                    <label for="jaminan" class="block">JAMINAN</label>
                    <input type="input" class="border rounded p-2 w-full" name="jaminan" value="{{ $transaksi->jaminan }}">

                    <label for="status" class="block">STATUS</label>
                    <select name="status" id="status" class="border rounded p-2 w-full">
                        <option value="{{ $transaksi->status }}">{{ $transaksi->status }}</option>
                        <option value="LUNAS">LUNAS</option>
                        <option value="PROSES">PROSES</option>
                        <option value="BELUM LUNAS">BELUM LUNAS</option>
                    </select>

                    <button class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded w-full">
                        UPDATE
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection