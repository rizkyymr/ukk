@extends('layout.header')
@section('main')
    <div class="container">
        <div class="mx-10 my-6">
            <h1 class="text-3xl font-semibold text-start">
                DATA PEMINJAM
            </h1>
        </div>

        <div class="mx-16">
            <a href="{{ route('peminjam.create') }}" class=" bg-blue-400 hover:bg-blue-300 text-white rounded px-4 py-2" >
                CREATE
            </a>
        </div>

        <table class="mt-6 table w-screen border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">NO</th>
                    <th class="border border-gray-300 px-4 py-2">NAMA</th>
                    <th class="border border-gray-300 px-4 py-2">ALAMAT</th>
                    <th class="border border-gray-300 px-4 py-2">FOTO</th>
                    <th class="border border-gray-300 px-4 py-2">ACTION</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($peminjam as $index => $peminjam)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $peminjam->nama }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $peminjam->alamat }}</td>
                        <td class="border border-gray-300 px-4 py-2 justify-center items-center">
                            <img src="{{ asset($peminjam->foto) }}" height="150px" width="150px" alt="">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a 
                                    href="{{  route('peminjam.edit', $peminjam->id_peminjam) }}" 
                                    class="bg-green-600 hover:bg-green-500 text-white rounded px-4 py-2 me-2">
                                    EDIT
                                </a>
                                <form action="{{ route('peminjam.destroy', $peminjam->id_peminjam) }}" method="POST">
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
                        <td colspan="5">BELUM ADA DATA</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
@endsection