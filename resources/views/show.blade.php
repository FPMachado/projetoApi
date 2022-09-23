@extends('templates.padrao')

@section('content')
    <div class="container mx-auto py-8 w-full">   
        <div class="grid grid-rows-3 grid-flow-col gap-4">
            <div class="row-span-3 p-0">
                <img src="{{ $poster }}" alt="">
            </div>

            <div colspan="2" class="row-span-3">
                <div class="mb-4">
                    <h1 class="text-2xl"> {{ $infoFilme['title'] . " (".substr(date('d/m/Y', strtotime($infoFilme['release_date'])), 6) .")" }} </h1>
                    <h3 class="italic">{{$infoFilme['tagline']}}</h3>     
                </div>
                
                <div class="mb-4">
                    <h3> <b>Nota: </b>{{ number_format($infoFilme['vote_average'], 2) }} </h3>
                </div>
                
                <div class="mb-4">
                    @php
                        foreach ($infoGenero as $genero) {
                            $generos[] = $genero['name'];
                        }
                        $stringGenero = implode(", ", $generos);
                    @endphp
                    <h2><b>Gênero:</b> {{ $stringGenero }}</h2>
                </div>
                          
                <div class="mb-4">
                    <h2><b>Sinopse</b></h2>
                    {{ $infoFilme['overview'] }}
                </div>
                
                <div class="mt-14">
                    <a href="#" title="Assistir trailer"><span class="text-3xl"><i class="fas fa-play-circle"></i></span></a>
                </div>

            </div>


        </div> 
    </div>

@endsection
