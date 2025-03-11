<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>REGISTER</title>
  </head>
  <body>
    <div class="bg-white">
        <div class="flex h-screen">
            <div class="w-1/3 flex flex-col justify-center items-center">
                <div class="w-full max-w-md px-6">
                    <div class="text-center">
                        <h1 class="text-2xl font-bold mb-6">REGISTER FORM</h1>
                    </div>

                    <div class="mt-8">
                        <form action="{{ route('register') }}" method="POST">
                            @csrf
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-600">Name:</label>
                                    <input type="text" id="name" name="name" value="{{ old('name') }}" required 
                                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                                    @error('name')
                                        <div class="error text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-600">Email:</label>
                                    <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                                    @error('email')
                                        <div class="error text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password" class="block text-sm font-medium text-gray-600">Password:</label>
                                    <input type="password" name="password" id="password" required 
                                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                                    @error('password')
                                        <div class="error text-red-500">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div>
                                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" required 
                                        class="mt-1 block w-full px-4 py-2 border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40">
                                </div>

                                <button type="submit" 
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    REGISTER
                                </button>
                            </div>
                            
                            <div class="mt-6 text-sm text-center text-gray-400">
                                Sudah Punya Akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Masuk Disini</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="w-2/3 bg-cover bg-center" style="background-image: url('{{ asset('images/sepeda.jpg') }}')">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">Rental Sepeda</h2>
                        <p class="max-w-xl mt-3 text-gray-300">
                            Bergabunglah untuk menikmati pengalaman bersepda yang menyenagkan dengan layanan terbaik kami.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html> 