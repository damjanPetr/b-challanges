<x-layout.main-layout title="Home" :img="$img">


    <x-slot:heading>
        Clean Blog
    </x-slot:heading>

    <x-slot:subheading>
        A blog theme by start Bootstrap
    </x-slot:subheading>
    <x-slot:bottom>

    </x-slot:bottom>


    <div class="text-center mx-auto w-[500px] pt-10">





        <x-homepage.posts>
            <x-slot:heading class="">Lorem, ipsum. 1</x-slot:heading>
            <x-slot:text class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat,
                iusto.</x-slot:text>
            <x-slot:author class="">Jonh Doe</x-slot:author>

        </x-homepage.posts>

        <x-homepage.posts>
            <x-slot:heading class="">Lorem, ipsum. 2</x-slot:heading>
            <x-slot:text class=""></x-slot:text>
            <x-slot:author class="">Jonh Doe</x-slot:author>

        </x-homepage.posts>

        <x-homepage.posts>
            <x-slot:heading class="">Lorem, ipsum. 3</x-slot:heading>
            <x-slot:text class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Distinctio velit
                quaerat, esse numquam debitis cumque illum labore, maxime soluta eveniet eum quidem! Quaerat eum et
                ducimus sunt rem alias quos assumenda ipsam provident enim, deserunt repudiandae pariatur officiis neque
                nostrum!</x-slot:text>
            <x-slot:author class="">Jonh Doe</x-slot:author>
        </x-homepage.posts>

        <x-homepage.posts>
            <x-slot:heading class="">Lorem, ipsum. 4</x-slot:heading>
            <x-slot:text class="">Lorem ipsum dolor sit amet.</x-slot:text>
            <x-slot:author class="">Missy Doe</x-slot:author>
        </x-homepage.posts>

        {{-- <x-homepage.posts author=""></x-homepage.posts> --}}
        {{-- <x-homepage.posts author=""></x-homepage.posts> --}}

        <a class="block bg-sky-700 p-2 w-fit ml-auto mr-7 text-white" href="$">Show older posts -> </a>
    </div>




</x-layout.main-layout>
