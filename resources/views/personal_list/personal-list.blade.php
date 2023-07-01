@extends('templates.padrao')

@section('content')

    @include('mensagem')

    <div  class="container mx-auto py-8 w-full">
        <div class="text-right mt-3">
            <form action=" {{ route("my-personal-list.movie.search", ['user' => auth()->user()->id])}} " method="post">
                @csrf
                <input class="border border-black text-xl px-6 py-2 rounded-md w-80" type="text" name="pesquisa" placeholder="Digite o nome do filme" value="{{old('pesquisa')}}">
                <button type="submit" class="bg-yellow-500 text-xl text-black font-sans duration-500 px-6 py-2 hover:bg-yellow-300 rounded">Pesquisar</button>
            </form>
        </div>

        <h1 class="text-center text-3xl mb-3 text-yellow-500">Minha Lista Pessoal</h1>
        <table class="w-full text-sm text-left bg-gray-500">
            <thead class="bg-yellow-500 border-collapse border border-black text-xs uppercase text-center">
                <tr>
                    <th scope="col" class="py-3 px-6">Poster</th>
                    <th scope="col" class="py-3 px-6">Nota</th>
                    <th scope="col" class="py-3 px-6">Nome</th>
                    <th scope="col" class="py-3 px-6">Data de Lançamento</th>
                    <th scope="col" class="py-3 px-6" colspan="2">Opções</th>
                </tr>
            </thead>

            @if (!empty($personal_movies->total))
                @foreach ($personal_movies as $movie)
                    <tbody class="text-xl">  
                        <tr class=" hover:bg-yellow-500 rounded border-collapse border border-black">
                            <td class="flex justify-center"><img class="rounded-lg shadow-2xl" src={{ $movie->img_src }} width="90"></td>
                            <td class="text-center"> {{ !empty($personal_data->note) ? $personal_data->note : number_format($movie->note, 1)}} </td>
                            <td class="text-center"> {{$movie->name}} </td>
                            <td class="text-center"> {{Carbon\Carbon::create($movie->release_date)->format('d/m/Y')}} </td>
                            <td class="text-center" title="Editar informações"> <a href=" {{route('my-personal-list.movie.show', ['user' => auth()->user()->id, 'movie' => $movie->id])}} "><i class="fas fa-edit"></i></a></td>   
                            <form action="{{route('my-personal-list.movie.delete', ['user' => auth()->user()->id, 'movie' => $movie->personal_list_id]) }}" method="post">
                                <input type="hidden" name="list_id" value="{{ $movie->personal_list_id}}">
                                @csrf @method('DELETE')
                                    <td class="text-center" title="Excluir da minha lista"> 
                                        <button type="submit"><i class="fas fa-times"></i></button>
                                        
                                    </td>
                            </form> 
                        </tr>
                    </tbody>
                @endforeach
            @else
                <tbody class="text-xl">
                    <tr>
                        <td class="text-center py-2" colspan="5">Nenhum filme adicionado</td>
                    </tr>
                </tbody>
            @endif

        </table>
        @if (!empty($personal_movies))
            {{ $personal_movies->links() }}
        @endif
    </div>
@endsection