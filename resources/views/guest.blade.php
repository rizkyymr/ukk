<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Rental Sepeda</title>
</head>
<body>
    {{-- navbar --}}
    <nav class="bg-black sticky top-0 z-50 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-4xl font-bold">
                <h1>
                    RENTAL SEPEDA
                </h1>
            </div>

            <div class="space-x-4">
                <a href="#home" class="text-gray-300 hover:text-white">HOME</a>
                <a href="#about" class="text-gray-300 hover:text-white">TENTANG KAMI</a>
                <a href="#sepeda" class="text-gray-300 hover:text-white">SEPEDA KAMI</a>
                <a href="#contact" class="text-gray-300 hover:text-white">CONTACT</a>
            </div>
        </div>
    </nav>

    {{-- home --}}
    <section id="home" class="flex items-center justify-center h-screen bg-cover bg-center" style="background-image: url('{{ asset('images/welcome.jpg') }}')">
        <div class="bg-black/50 p-10 rounded-lg text-center text-white">
            <h1 class="font-bold text-4xl">SEWA SEPEDA UNTUK PETUALANGAN ANDA</h1>
            <p class="text-gray-200 mt-4">Nikmati pengalaman bersepda yang menyenagkan dengan layanan terbaik kami.</p>
            <a href="#sepeda" class="bg-red-600 hover:bg-red-500 rounded px-4 py-2 mt-6 inline-block">Lihat Sepeda</a>
        </div>
    </section>

    {{-- about --}}
    <section id="about" class="py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">TENTANG KAMI</h2>
            <p class="mt-4 text-center text-gray-600">Kami adalah penyedia layanan sewa sepeda yang berkomitmen untuk memberikan pelanyanan terbaik untuk pelanggan kami.</p>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg-grid-cols-4 gap-6 mt-10">
                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold">Sepeda Berkualitas</h3>
                    <p class="mt-2 text-center text-gray-600">Kami menyediakan sepeda dengan kualitas terbaik untuk pengalaman bersepeda yang menyenangkan.</p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold">Harga Terjangkau</h3>
                    <p class="mt-2 text-center text-gray-600">Nikmati layanan sewa sepeda dengan harga yang bersahabat.</p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold">Pelayanan 24/7</h3>
                    <p class="mt-2 text-center text-gray-600">Kami siap melayani anda kapan saja.</p>
                </div>

                <div class="bg-white shadow-lg rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold">Free Maintenance</h3>
                    <p class="mt-2 text-center text-gray-600">Kami menyediakan pemeliharaan gratis untuk semua sepeda yang disewa.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- sepeda --}}
    <section id="sepeda" class="bg-gray-200 py-20">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">SEPEDA KAMI</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap6 mt-10">
                @foreach ($sepeda as $item)
                    <div class="bg-white shadow-lg rounded-lg p-6 text-center m-5">
                        <img src="{{ asset($item->foto) }}" alt="{{ $item->merk }}" class="h-100 w-full object-contain rounded-md">
                        <h3 class="text-xl font-semibold mt-4">{{ $item->merk }}</h3>
                        <p class="mt-2">JUMLAH: {{ $item->jumlah }}</p>
                        <p class="mt-2 font-bold">SEWA: Rp. {{ number_format($item->sewa, 0, ',', '.') }}</p>
                        
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- contact --}}
    <section id="contact" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center">KONTAK KAMI</h2>
            <div class="mt-8 max-w-lg mx-auto text-center">
                <p class="mt-4">Nomor HP: <a href="#" class="text-blue-600 hover:underline">+62 82217285909</a></p>
                <p class="mt-2">Email: <a href="#" class="text-blue-600 hover:underline">rentalsepeda@gmail.com</a></p>
                <p class="mt-2">Alamat: Jl. Contoh No. 123, Padang, Indonesia</p>
            </div>
        </div>
    </section>

    {{-- footer --}}
    <footer class="bg-blue-600 text-white py-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Rental Sepeda, All rights reserved.</p>
        </div>
    </footer>
    
</body>
</html>