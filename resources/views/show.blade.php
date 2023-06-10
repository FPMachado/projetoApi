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

    @if (session('warning'))
        <div class="text-center w-full bg-yellow-400 mb-3"> {{session('warning')}} </div>
    @endif

    <form action="{{route('personal-list-store', $movie['id'])}}" method="post">
        @csrf 
        <input type="hidden" name="movie_id" value="{{$movie['id']}}">
        <input type="hidden" name="note" value="{{$movie['vote_average']}}">
        <input type="hidden" name="movie_name" value="{{$movie['title']}}">
        <input type="hidden" name="release_date" value="{{Carbon\Carbon::create($movie['release_date'])->format('Y/m/d')}}">
        <input type="hidden" name="synopsis" value="{{$movie['overview']}}">
        <input type="hidden" name="img_poster" width="50" value="{{$movie['poster_url']}}">
        <div class="container mx-auto py-2 w-full bg-gray-700 rounded-lg mt-3">
            <div class="flex">
                <div class="px-3 py-3">
                    <img class="rounded-lg shadow-2xl border border-yellow-500" width="300" src="{{ $movie['poster_url'] }}" alt="">
                </div>

                <div class="flex-1 ml-3 mt-3 w-64">
                    <span class="my-3">
                        <h1 class="text-2xl"> {{ $movie['title'] . ' (' . Carbon\Carbon::create($movie['release_date'])->diffForHumans() . ')' }} </h1>
                        <h3 class="italic mb-2">{{ $movie['tagline'] }}</h3>
                        <div class="relative w-12 h-12 border-double border-4 bg-black text-white border-white rounded flex justify-center items-center text-center p-5 shadow-xl">
                            <span class="absolute text-sm text-center text-white">
                                @foreach ($movie['release_dates'] as $results)
                                    @foreach ($results as $item)
                         
                                        @if ($item['iso_3166_1'] == "BR")
                                            @foreach ($item['release_dates'] as $age)
                                                {{!empty($age) ? $age['certification'] : "SC"}}
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endforeach
                            </span>
                        </div>
                    </span>

                    <div class="flex space-x-5">
                        <span>
                            <h3 class="my-6 font-bold">Nota: {{ $movie['vote_average'] }} </h3> 
                        </span>
                    </div>

                    @if (!empty($movie['genres']))
                        <h2 class="my-3"><b>Gênero:</b>
                            @foreach($movie['genres'] as $genre)
                                {{ $genre['name'] . (count($movie['genres']) > 1 && !$loop->last ? ', ' : null )}}
                            @endforeach
                        </h2>
                    @endif

                    <div class="flex space-x-48">
                        <h2 class="my-3"><b>Diretor:</b>
                            @foreach ($movie['credits']['crew'] as $director_name)
                                @if ($director_name['job'] == "Director")
                                    {{$director_name['name'] . (count($director_name) > 1 && !$loop->last ? ", " : null)}}
                                @endif
                            @endforeach    
                        </h2>                 
                    </div>

                    <div class="flex space-x-48">
                        <h2 class="my-3"><b>Roteirista:</b>
                            @foreach ($movie['credits']['crew'] as $writer_name)
                                @if ($writer_name['job'] == "Writer")
                                    {{$writer_name['name']}}
                                @endif
                            @endforeach   
                        </h2>
                    </div>
                </div>        
                
                <div class="py-36 space-y-10">
                    <h2 class="mr-64"><b>Situação do filme:</b> {{($movie['status'] == 'Released') ? "Lançado" : "Não Lançado"}} </h2>
                    <h2 class="mr-64"><b>Orçamento:</b> R$ {{number_format($movie['budget'], 2, ",", ".")}}</h2>
                    <h2 class="mr-64"><b>Receita:</b> R$ {{number_format($movie['revenue'], 2, ",", ".")}} </h2>
                </div>
                
            </div>

            <div class="px-3 py-2">
                <hr class="mb-2">

                <a href="{{route('movie.index')}}">
                    <button class="bg-orange-500 hover:bg-orange-400 rounded-lg px-6 py-2 w-56" type="button"><i class="fas fa-arrow-left"></i> Voltar</button>
                </a>

                @if (!empty($movie['videos']['results']))
                    @foreach ($movie['videos'] as $trailer)
                        <a href="https://www.youtube.com/watch?v={{$trailer[0]['key']}}" target="_blank" title="Assistir trailer">
                            <button class="bg-yellow-500 hover:bg-yellow-400 rounded-lg px-6 py-2 w-56" type="button">
                                    <i class="fas fa-play"></i> 
                                    Assitir Trailer
                            </button>
                        </a>
                    @endforeach
                @endif
                <button class="bg-green-500 hover:bg-green-400 rounded-lg px-6 py-2" type="submit"><i class="fas fa-plus"></i> Adicionar na minha lista</button>
            </div>
                        
            <div class="px-3 py-2">
                <hr>
                <span>
                    <h2 class="py-2 text-xl"><b>Sinopse</b></h2>
                    <p>{{ $movie['overview'] }}</p>
                </span>
            </div>  
            
        </div>
    </form>
@endsection
