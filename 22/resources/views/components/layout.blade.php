<div>
    <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
    <html>
  <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Challenge 22' }}</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
  </head>
  @vite('resources/css/app.css')

  <body class="">
    <header class="bg-red-400 text-white p-4">
        <nav class=" p-1 mx-auto space-x-4 ">
            <a           class="rounded-md   hover:ring-2 hover:ring-amber-700 hover:translate-y-2 p-2 border-red-600 border-2 "     href="/">Home</a>
            @if (!session('username'))
            <a           class="rounded-md   hover:ring-2 hover:ring-amber-700 hover:translate-y-2 p-2 border-red-600 border-2 "     href="form   ">Log In</a>

        @endif
            @if (session('username'))
                <a href="/logout" class="rounded-md bg-yellow-400 text-amber-950  hover:ring-2 hover:ring-orange-700 hover:translate-y-2 p-2 border-yellow-600 border-2 ">Logout</a>
            @endif
        </nav>
    </header>

    <main class="">
    {{ $slot }}
    </main>
  </body>
</html>
</div>
