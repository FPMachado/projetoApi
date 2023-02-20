@extends('templates.padrao')

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $erro)
            <div class="text-center w-full bg-red-400 mb-3"> {{ $erro }} </div>
        @endforeach
    @endif

    @if (session('message'))
        <div class="text-center w-full bg-green-400 mb-3"> {{session('message')}} </div>
    @endif

    <form action="" method="post">
        @csrf
        <div class="container mx-auto py-2 w-full bg-gray-700 rounded-lg mt-3">
            <div class="flex p-3">
                {{-- <div class="px-3 py-3">
                    <img class="rounded-lg shadow-2xl" src="{{ $poster }}" alt="">
                </div> --}}
                <div>
                    <label for="name">Nome do Filme</label>
                    <input type="text" name="name" id="name" value="{{$teste->name}}" class="border w-full text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400"> 
    
                </div>
                <div class="ml-4">
                    <label for="note">Nota</label>
                    <input type="text" name="note" id="name" value="{{$teste->note}}" class="border w-14 text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400">
                </div>
            </div>
        </div>
    </form>
@endsection