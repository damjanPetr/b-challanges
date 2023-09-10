<x-layout.main-layout class="" :img="$img" title="Contact">

    <x-slot:heading>
        Contact me
    </x-slot:heading>
    <x-slot:subheading>
        Have questions? I have answers!
    </x-slot:subheading>
    <x-slot:bottom>

    </x-slot:bottom>

    <div class="w-96 mx-auto mt-10">

        <form action="p-4 space-y-4 text-left ">

            <div class="space-y-4 flex flex-col  [&_>_*]:border-b-2  [&_>_*]:outline-none ">
                <input class=" focus:ring-blue-800 hover:ring-2 placeholder:relative p-1   top-2 " placeholder="Name"
                    type="text" name="name" id="name">
                <input class=" focus:ring-blue-800 hover:ring-2 placeholder:relative p-1   top-2 "
                    placeholder="Email Adress" type="text" name="email" id="email">
                <input class=" focus:ring-blue-800 hover:ring-2 placeholder:relative p-1   top-2 " placeholder="Message"
                    type="text" name="tel " id="tel">
            </div>

            <textarea name="message" id="message" rows="10" class="w-full top-6 p-2 m-2"></textarea>
            <button class="rounded-sm block bg-sky-500 p-2 w-fit mr-auto ml-7 mb-4 text-white" href="$">Send
            </button>

        </form>
    </div>



</x-layout.main-layout>
