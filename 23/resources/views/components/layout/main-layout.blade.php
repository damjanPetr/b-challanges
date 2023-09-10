<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Challange 23' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body>

    <div class="w-full relative">
        {{-- <div id='head' class="w-full z-50"> --}}
        <x-header class=""></x-header>
        {{-- </div> --}}



        <img src={{ $img }} alt=""
            class=" isolate -z-10  h-[400px]   object-cover object-center  w-full  brightness-50 " />

        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2">

            <div class="mb-16  w-[450px] mt-20">]
                <h1 class="my-8 text-3xl text-white font-extrabold">{{ $heading }}</h1>
                <p class="capitalize text-gray-300  mb-10 text-2xl font-bold">{{ $subheading }}</p>
                <p class="capitalize text-gray-300 text-base font-semibold">{{ $bottom }}</p>
            </div>
        </div>
    </div>

    <div class="main-layout max-w-3xl mx-auto text-white   ">




        <div class="w-full bg-white/40 h-1 opacity-0 peer-hover:visible transition-opacity peer-hover:animate-appear  ">


        </div>



        <main class=" text-black">

            {{ $slot }}

        </main>


        <!-- <div class="border-t w-screen"></div> -->
        <x-footer></x-footer>
    </div>

</body>

</html>
