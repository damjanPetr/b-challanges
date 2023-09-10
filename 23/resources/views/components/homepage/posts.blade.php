<div id="test" class="text-lg p-4 space-y-4 text-left" {{ $attributes->merge(['class' => '']) }}>

    <h2 class="text-2xl text-gray-900  font-semibold">{{ $heading }}</h2>
    <p class="text-sm leading-tight text-gray-700">{{ $text }}</p>
    <p class="text-sm text-gray-500 italic ">Posted By: <span
            class="text-gray-900 italic font-bold">{{ $author }}</span></p>
    <hr>
</div>
