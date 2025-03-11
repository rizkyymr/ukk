<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>LOGIN</title>
  </head>
  <body>
    <div class="bg-white">
        <div class="flex justify-center h-screen">
            <div class="hidden bg-cover lg:block lg:w-2/3" style="background-image: url('{{ asset('images/sepeda.jpg') }}')">
                <div class="flex items-center h-full px-20 bg-gray-900 bg-opacity-40">
                    <div>
                        <h2 class="text-2xl font-bold text-white sm:text-3xl">Rental Sepeda</h2>
                        <p class="max-w-xl mt-3 text-gray-300">
                            Nikmati pengalaman bersepeda yang menyenangkan dengan layanan terbaik kami.
                        </p>
                    </div>
                </div>
            </div>
    
            <div class="flex items-center w-full max-w-md px-6 mx-auto lg:w-2/6">
                <div class="flex-1">
                    <div class="text-center">
                        <h1 class="text-2xl font-bold mb-6">LOG IN FORM</h1>
                        <p class="mt-3 text-gray-500">Sign in to access your account</p>
                    </div>
    
                    <div class="mt-8">
                        <form action="{{ route('login') }}" method="POST">
                            @csrf

                            <div>
                                <label for="login" class="block mb-2 text-sm text-gray-600">Name/Email</label>
                                <input type="text" name="login" id="login" placeholder="Username/Email Anda" value="{{ old('login') }}" required class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @error('login')
                                <div class="error text-red-500">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label for="password" class="text-sm text-gray-600">Password</label>
                                    <a href="#" class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline">Forgot password?</a>
                                </div>
    
                                <input type="password" name="password" id="password" placeholder="Password Anda" required class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-lg focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40" />
                                @error('password')
                                <div class="error text-red-500">{{ $message }}</div>
                            @enderror
                            </div>
    
                            <div class="mt-6">
                                <button class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-300 transform bg-blue-500 rounded-lg hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                                    Sign in
                                </button>
                            </div>
    
                        </form>
    
                        <p class="mt-6 text-sm text-center text-gray-400">Belum Punya Akun? <a href="{{ route('register') }}" class="text-blue-500 focus:outline-none focus:underline hover:underline">Buat Akun Sekarang</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html> 
