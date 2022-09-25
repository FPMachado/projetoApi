@extends('templates.padrao')

@section('content')

    @if ($errors->any())   
        @foreach ($errors->all() as $erro)
            <div class="text-center w-full bg-red-400 mb-3"> {{$erro}} </div>
        @endforeach
    @endif

    <div class="container mx-auto py-8 w-full">   
        <div class= "bg-gray-700 rounded-lg">
            <div class="flex">
                <div class="px-3 py-3">
                    <img class="rounded-lg shadow-2xl" src="{{$poster}}" alt="">
                </div>
                
                <div class="ml-3 mt-3">
                    <span class="my-3">
                    <h1 class="text-2xl"> {{ $titulo . " (". $anoLancamento .")" }} </h1>
                    <h3 class="italic">{{$tagLine}}</h3>  
                    <div class="relative w-12 h-12 border-double border-4 bg-black text-white border-white rounded flex justify-center items-center text-center p-5 shadow-xl">
                        <span class="absolute text-sm text-center text-white">
                            {{$classificacao}}
                        </span>
                    </div>
                </span>
                
                <div class="flex space-x-48">
                    <span>
                        <h3 class="my-6 font-bold">Nota: {{ $nota }} </h3> 
                    </span>
                    
                    <button class="hover:text-yellow-500">
                        <a href=" {{$trailer}} "  target="_blank" title="Assistir trailer">
                            <span class="text-3xl my-6">
                                <i class="fab fa-youtube"></i>
                            </span> 
                            <span class="text-bold text-lg">Assitir Trailer</span>
                        </a>
                    </button>
                    
                    <span class="hover:text-cyan-500">
                    </span>
                </div>
                
                <h2 class="my-3"><b>Gênero:</b> {{ $genero }}</h2>
                
                <div class="flex space-x-48">
                    <span class="my-3">
                        <h2 class="font-bold">Diretor:</h2>
                        <h2>{{$nomeDiretor}}</h2>
                        <!--<h2 class="font-bold">Filme mais popular deste diretor:</h2>
                        <div class="px-2 py-1">
                            <img class="rounded-lg shadow-2xl" src="/*$posterPopular}}*/" alt="">
                        </div>-->
                    </span>
                    
                    <span class="my-3">
                        <h2 class="font-bold">Roteirista:</h2>
                        <h2>{{$nomeEscritor}}</h2>
                    </span>
                </div>
                
            </div>

            <div>
                <button class="bg-green-500 text-white">Adicionar na minha lista</button>
            </div>

        </div> 
        <div class="px-3 py-2">
            <hr>
            <span>
                <h2 class="py-2"><b>Sinopse</b></h2>
                <p>{{ $sinopse }}</p>
            </span>
        </div>
    </div>
@endsection
