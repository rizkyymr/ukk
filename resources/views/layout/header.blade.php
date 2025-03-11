<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>WEBSITE RENTAL</title>
</head>
<body>
    <nav class="bg-blue-300 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-4xl font-bold">
                <h1>
                    RENTAL
                </h1>
            </div>

            <div class="space-x-4">
                <a href="{{ route('dashboard') }}" class="text-gray-500 hover:text-white">DASHBOARD</a>
                <a href="{{ route('peminjam.index') }}" class="text-gray-500 hover:text-white">CUSTOMER</a>
                <a href="{{ route('sepeda.index') }}" class="text-gray-500 hover:text-white">BICYCLE</a>
                <a href="{{ route('transaksi.index') }}" class="text-gray-500 hover:text-white">TRANSACTION</a>
            </div>

            <div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    @method('POST')
                    <button class="text-gray-500 hover:text-white">
                        LOG OUT
                    </button>
                </form>
            </div>
        </div>
    </nav>
    @yield('main')
</body>
</html>