@if ($errors->any())
    @foreach ($errors->all() as $erro)
        <div class="text-center w-full bg-red-400 mb-3"> {{ $erro }} </div>
    @endforeach
@endif

@if (session('message'))
    <div class="text-center w-full bg-green-400 mb-3"> {{session('message')}} </div>
@endif

@if (session('warning'))
    <div class="text-center w-full bg-yellow-400 mb-3"> {{session('warning')}} </div>
@endif