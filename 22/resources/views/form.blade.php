


<x-layout>



    <form action="/login" method="POST" class="mx-auto w-96 bg-stone-50/80 focus-within:ring-violet-200 focus-within:ring-2 mt-52 rounded-lg flex items-center flex-col shadow-inner border">
        @csrf

        @if ($errors->any())
    <div class="alert alert-danger bg-red-500 p-2 rounded-lg text-white ">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
        <div class="p-4 ">
            <input value="{{$first_name ??''}}" class="ring-1 placeholder:capitalize text-lg  p-2 focus:ring-2 focus:ring-indigo-300 outline-none rounded-lg" type="text" name="first_name" id="first_name" placeholder="First Name">
        </div>
        <div class="p-4 ">
            <input value="{{$last_name ??''}}" class="ring-1 placeholder:capitalize text-lg  p-2 focus:ring-2 focus:ring-indigo-300 outline-none rounded-lg" type="text" name="last_name" id="last_name" placeholder="Last Name">
        </div>

        <div class="p-4 ">
            <input value="{{$email ??''}}" class="ring-1 placeholder:capitalize text-lg  p-2 focus:ring-2 focus:ring-indigo-300 outline-none rounded-lg" type="email" name="email" id="email" placeholder="Email">

        </div>
        <button class="mb-8 rounded-lg  bg-blue-300 p-4 text-white hover:scale-110 transition-transform" >Submit</button>
    </form>
</x-layout>


