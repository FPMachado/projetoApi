@extends('templates.padrao')

@section('content')

    @if ($errors->any())
        @foreach ($errors->all() as $erro)
            <div class="text-center w-full bg-red-400 mb-3"> {{ $erro }} </div>
        @endforeach
    @endif
    <form action="{{route('index.store', $id)}}" method="post">
        @csrf 
        <input type="hidden" name="movie_id" value="{{$id}}">
        <input type="hidden" name="movie" value="{{$titulo}}">
        <div class="container mx-auto py-2 w-full bg-gray-700 rounded-lg mt-3">
            <div class="flex">
                <div class="px-3 py-3">
                    <img class="rounded-lg shadow-2xl" src="{{ $poster }}" alt="">
                </div>

                <div class="flex-1 ml-3 mt-3 w-64">
                    <span class="my-3">
                        <h1 class="text-2xl"> {{ $titulo . ' (' . $anoLancamento . ')' }} </h1>
                        <h3 class="italic mb-2">{{ $tagLine }}</h3>
                        <div class="relative w-12 h-12 border-double border-4 bg-black text-white border-white rounded flex justify-center items-center text-center p-5 shadow-xl">
                            <span class="absolute text-sm text-center text-white">
                                {{ $classificacao }}
                            </span>
                        </div>
                    </span>

                    <div class="flex space-x-5">
                        <span>
                            <h3 class="my-6 font-bold">Nota: {{ $nota }} </h3> 
                        </span>
                        
                        {{-- @if (!empty($trailer))
                        <button class="hover:text-yellow-500" type="button">
                            <a href=" {{$trailer}} "  target="_blank" title="Assistir trailer">
                                <span class="text-2xl my-6">
                                    <i class="fas fa-play"></i>
                                </span> 
                                <span class="text-bold text-lg">Assitir Trailer</span>
                            </a>
                        </button>
                        @endif --}}
                    </div>

                    @if (!empty($genero))
                        <h2 class="my-3"><b>Gênero:</b> {{ $genero}}</h2>
                    @endif

                    <div class="flex space-x-48">
                        <span class="my-3">
                            @if (!empty($nomeDiretor))
                                <h2 class="font-bold">Diretor:</h2>
                                <h2>{{$nomeDiretor}}</h2>
                            @endif
                            {{-- <h2 class="font-bold">Filme mais popular deste diretor:</h2>
                            <div class="px-2 py-1">       
                                <img class="rounded-lg shadow-2xl" src="{{$posterPopular}}" alt="">
                            </div>        --}}
                        </span>
                    
                        @if (!empty($nomeEscritor))
                            <span class="my-3">
                                <h2 class="font-bold">Roteirista:</h2>
                                <h2>{{$nomeEscritor}}</h2>
                            </span>
                        @endif
                    </div>
                </div>        
                
                <div class="py-36 space-y-10">
                    <h2 class="mr-64"><b>Situação do filme:</b> {{$status}} </h2>
                    <h2 class="mr-64"><b>Orçamento:</b> {{$orcamento}} </h2>
                    <h2 class="mr-64"><b>Receita:</b> {{$receita}} </h2>
                </div>

            </div>
                

            <div class="px-3 py-2">
                <hr class="mb-2">
                @if (!empty($trailer))
                <button class="bg-yellow-500 hover:bg-yellow-400 rounded-lg px-6 py-2" type="button">
                    <a href=" {{$trailer}} "  target="_blank" title="Assistir trailer">
                        <i class="fas fa-play"></i>
                        Assitir Trailer
                    </a>
                </button>
                @endif
                <button class="bg-green-500 hover:bg-green-400 rounded-lg px-6 py-2" type="submit">Adicionar na minha lista</button>
            </div>
            
            
            <div class="px-3 py-2">
                <hr>
                <span>
                    <h2 class="py-2 text-xl"><b>Sinopse</b></h2>
                    <p>{{ $sinopse }}</p>
                </span>
            </div>  
            
        </div>
    </form>
@endsection
