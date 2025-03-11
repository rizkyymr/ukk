@extends('layout.header')
@section('main')
    <div class="container">
        <div class="mx-10 my-6">
            <h1 class="text-3xl font-semibold">
                DATA SEPEDA
            </h1>
        </div>

        <div class="mx-16">
            <a href="{{ route('sepeda.create') }}" class="bg-blue-400 hover:bg-blue-300 text-white px-4 py-2 rounded">
                CREATE
            </a>
        </div>

        <table class="mt-6 table w-screen border-collapse border border-gray-300">
            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-2">NO</th>
                    <th class="border border-gray-300 px-4 py-2">MERK</th>
                    <th class="border border-gray-300 px-4 py-2">SEWA</th>
                    <th class="border border-gray-300 px-4 py-2">JUMLAH</th>
                    <th class="border border-gray-300 px-4 py-2">FOTO</th>
                    <th class="border border-gray-300 px-4 py-2">ACTION</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($sepeda as $index => $sepeda)
                    <tr class="text-center">
                        <td class="border border-gray-300 px-4 py-2">{{ $index + 1 }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $sepeda->merk }}</td>
                        <td class="border border-gray-300 px-4 py-2">Rp. {{ number_format($sepeda->sewa, 0, ',', '.') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $sepeda->jumlah }}</td>
                        <td class="border border-gray-300 px-4 py-2 justify-center items-center">
                            <img src="{{ asset($sepeda->foto) }}" height="150px" width="150px" alt="">
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('sepeda.edit', $sepeda->id_sepeda) }}"
                                    class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded">
                                    EDIT
                                </a>
                                <form action="{{ route('sepeda.destroy', $sepeda->id_sepeda) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded">
                                        DELETE
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">BELUM ADA DATA</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection