@extends('templates.padrao')

@section('content')

    @include('mensagem')

    <div  class="container mx-auto py-8 w-full">
        <div class="text-right mt-3">
            <form action=" {{ route('movie.search') }} " method="post">
                @csrf
                <input class="border border-black text-xl px-6 py-2 rounded-md w-80" type="text" name="search" placeholder="Digite o nome do filme" value="{{old('pesquisa')}}">
                <button type="submit" class="bg-yellow-500 text-xl text-black font-sans duration-500 px-6 py-2 hover:bg-yellow-300 rounded">Pesquisar</button>
            </form>
        </div>
   
        <h1 class="text-center text-3xl mb-3 text-yellow-500">Principais Filmes Polulares</h1>
        <table class="w-full text-sm text-left bg-gray-500">
            <thead class="bg-yellow-500 border-collapse border border-black text-xs uppercase text-center">
                <tr>
                    <th scope="col" class="py-3 px-6 ">Nota</th>
                    <th scope="col" class="py-3 px-6">Nome</th>
                    <th scope="col" class="py-3 px-6">Data de Lançamento</th>
                    <th scope="col" class="py-3 px-6">Opções</th>
                </tr>
            </thead>
            @foreach ($movies as $movie)
                <tbody class="text-xl">  
                    <tr class=" hover:bg-yellow-500 rounded border-collapse border border-black">
                        <td class="text-center"> {{ $movie['vote_average']}} </td>
                        <td> {{ $movie['title'] }} </td>
                        <td class="text-center"> {{ (array_key_exists('release_date', $movie)) ? date('d/m/Y', strtotime($movie['release_date'])) : "" }} </td>
                        <td class="text-center" title='Mais Informações sobre o filme'> <a href=" {{ route("movie.show", ['movie' => $movie['id']]) }}"><i class="fas fa-info-circle"></i></a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection