
<x-layout>
    <div class=" flex bg-orange-300 w-full h-full items-start">
        <div class="p-5 rounded-lg flex   items-start  ">
            <div class="">
                <p><span class="underline underline-offset-2 mr-1">Username</span> : <span> {{$first_name}} {{$last_name}} </span> </p>
                <p><span class="underline underline-offset-2 mr-1">Email</span> : <span> {{$email}} </span></p>

            </div>
            <div class="p-5 rounded-lg  ml-10">
                <a href="/logout" class="rounded-md bg-yellow-400 text-amber-950  hover:ring-2 hover:ring-orange-700 hover:translate-y-2 p-2 border-yellow-600 border-2 ">Logout</a>
            </div>
        </div>


    </div>


</x-layout>
