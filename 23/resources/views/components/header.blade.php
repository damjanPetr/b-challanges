<header class="w-screen z-10 fixed h-16   " id="head">
    <div
        class="p-4 flex text-lg  fixed peer items-center  z-10 top-0 w-full  max-w-2xl left-1/2 text-gray-300 -translate-x-1/2">

        <div class="hover:-translate-y-0.5 transition-transform {{ request()->routeIs('blog') ? 'text-white' : '' }} ">
            <a href={{ route('blog') }}>Blog</a>
        </div>
        <nav class="ml-auto">
            <ul class="flex gap-6 mr-4 p-2 ">
                <li
                    class="hover:-translate-y-0.5 transition-transform {{ request()->routeIs('home') ? 'text-white' : '' }}">
                    <a href={{ route('home') }}>Home</a>
                </li>
                <li
                    class="hover:-translate-y-0.5 transition-transform {{ request()->routeIs('about-me') ? 'text-white' : '' }}">
                    <a href={{ route('about-me') }}>About</a>
                </li>
                <li
                    class="hover:-translate-y-0.5 transition-transform {{ request()->routeIs('contact') ? 'text-white' : '' }}">
                    <a href={{ route('contact') }}>Contact</a>
                </li>
            </ul>
        </nav>
    </div>
</header>
