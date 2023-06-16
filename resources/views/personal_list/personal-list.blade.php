@extends('templates.padrao')

@section('content')
    <div  class="container mx-auto py-8 w-full">
        <div class="text-right mt-3">
            <form action=" " method="post">
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
                    <th scope="col" class="py-3 px-6" colspan="3">Opções</th>
                </tr>
            </thead>
            @foreach ($personal_movies as $movie)
            {{-- @dd($personal_movies['user_id']) --}}
                <tbody class="text-xl">  
                    <tr class=" hover:bg-yellow-500 rounded border-collapse border border-black">
                        <td class="flex justify-center"><img class="rounded-lg shadow-2xl" src={{ $movie->img_src }} width="90"></td>
                        <td class="text-center"> {{$movie->note}} </td>
                        <td class="text-center"> {{$movie->name}} </td>
                        <td class="text-center"> {{$movie->release_date}} </td>
                        <td class="text-center" title="Editar informações"> <a href=" {{route('personal-list-edit', ['id' => auth()->user()->id, 'list_id' => $movie->id])}} "><i class="fas fa-edit" style="color: rgb(255, 255, 255)"></i></a></td>
                        <td class="text-center" title="Excluir da minha lista"> <a href=" "><i class="fas fa-times" style="color: rgb(238, 10, 10)"></i></a></td>
                        <td class="text-center" title="Marcar como assistido"> <a href=" "><i class="fas fa-check" style="color: rgb(24, 240, 4)"></i></a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        {{-- {{ $personal_movies->links() }} --}}
    </div>
@endsection