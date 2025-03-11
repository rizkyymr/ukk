<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>WELCOME!</title>
  </head>
  <body>
    <div class="flex flex-col justify-center h-screen items-center bg-cover bg-center" style="background-image: url('{{ asset('images/welcome.jpg') }}')">
        <div class="bg-black/50 p-10 rounded-lg text-center">
            <h1 class="text-3xl font-bold text-center text-white">
              SELAMAT DATANG DI WEBSITE RENTAL
            </h1>
            <p class="mt-4 text-gray-300 max-w-xl">
              Selamat datang di layanan rental sepeda kami! Kami menyediakan berbagai jenis sepeda berkualitas untuk memenuhi kebutuhan bersepeda Anda. Dengan harga terjangkau dan pelayanan 24/7, kami siap membantu Anda menikmati pengalaman bersepeda yang menyenangkan. Mulai petualangan Anda bersama kami sekarang!
            </p>
            <a href="{{ route('login') }}" class="m-5 bg-blue-400 hover:bg-blue-300 text-white rounded px-4 py-2 inline-block">
                Get Started
            </a>
        </div>
    </div>
  </body>
</html> 