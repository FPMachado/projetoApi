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

    <form action="{{route('personal-list-update', ['id' => $data_movie->user_id, 'personal_list_id' => $data_movie->personal_list_id])}}" method="post">
        @csrf
        <div class="flex container mx-auto p-2 w-full bg-gray-700 rounded-lg mt-3">
            <input type="hidden" name="personal_list_id" value="{{$data_movie->personal_list_id}}">
            <div>
                @php
                    $poster_grande = str_replace("/w92", "/w300", $data_movie->img_src);
                @endphp
                <img src="{{$poster_grande}}" alt="" class="rounded-md shadow-xl border border-yellow-500">
            </div>

            <div class="ml-3" style="width: 350px !important;">
                <label for="name" class="block font-semibold text-yellow-500">Nome do Filme</label>
                <label class="font-semibold text-2xl">{{$data_movie->name}}</label>
                
                <label for="note" class="block font-semibold text-yellow-500">Nota</label>
                <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="text" name="note" id="note" value="{{$data_movie->note}}" >
                
                <label for="name" class="block font-semibold text-yellow-500">Data de lançamento</label>
                <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400 mb-6" type="date" name="release_date" id="release_date" value="{{$data_movie->release_date}}"> 
                
                <div>
                    <label for="name" class="block font-semibold text-yellow-500">Assistido em</label>
                    <input class="border text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" type="date" name="assisted_in" id="assisted_in" value="{{$data_movie->assisted_in}}"> 
                    <button class="bg-yellow-500 hover:bg-yellow-400 rounded-md px-2 py-1" type="button" onclick="assited()" title="Marcar como assitido"><i class="fas fa-check"></i></button>
                </div>
                
            </div>

            <div style="width: 490px !important;">
                <label for="note" class="block font-semibold text-yellow-500">Sinopse</label>
                <textarea class="border resize-y text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" name="synopsis" id="synopsis" cols="61" rows="5">{{$data_movie->synopsis}}</textarea>
                <label for="note" class="block font-semibold text-yellow-500">Observações sobre o filme</label>
                <textarea class="border resize-y text-base px-2 py-1 rounded-md focus:outline-none focus:ring-0 focus:border-yellow-400" name="observation" id="observation" cols="61" rows="5">{{$data_movie->observation}} </textarea>
                <div class="flex">
                    <button class="bg-green-500 hover:bg-green-400 rounded-lg py-3 px-3" style="width: 176px;" type="submit">Salvar alterações</button>
                    <button class="bg-red-500 hover:bg-red-400 rounded-lg py-3 px-3 ml-32" style="width: 176px;">Remover da Lista</button>
                </div>
            </div>
        </div>

    </form>
@endsection