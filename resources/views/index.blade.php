@extends('templates.padrao')


@section('content')
@if ($errors->any())   
    @foreach ($errors->all() as $erro)
        <div class="text-center w-full bg-red-400"> {{$erro}} </div>
    @endforeach
@endif

    <div>
        <form action=" {{ route('index.search') }} " method="post">
            @csrf
            <input type="text" name="pesquisa" placeholder="Digite o nome do filme" value="{{old('pesquisa')}}">
            <button type="submit" class="bg-cyan-500 text-xl text-white font-[Poppins] duration-500 px-6 py-2 mx-2 hover:bg-cyan-300 rounded">Pesquisar</button>
        </form>
    </div>

    
    <h1 class="text-center text-3xl">Principais Novos Filmes</h1>
    <div class='flex p-5 justify-center items-center'>
        <table class="w-full text-sm text-left">
            <thead class="bg-cyan-500 border-collapse border border-slate-500 text-xs uppercase text-center">
                <tr>
                    <th scope="col" class="py-3 px-6 ">Nota</th>
                    <th scope="col" class="py-3 px-6">Nome</th>
                    <th scope="col" class="py-3 px-6">Data de Lançamento</th>
                    <th scope="col" class="py-3 px-6" colspan="">Utilitários</th>
                </tr>
            </thead>
            @foreach ($filmes as $filme)
            <tbody class="text-xl">  
                <tr class=" hover:bg-cyan-300 rounded border-collapse border border-slate-500">
                    <td class="text-center"> {{ $filme['vote_average']}} </td>
                    <td> {{ $filme['title'] }} </td>
                    <td class="text-center"> {{ (array_key_exists('release_date', $filme)) ? date('d/m/Y', strtotime($filme['release_date'])) : "" }} </td>
                    <td class="text-center" title='Mais Informações sobre o filme'> <a href=" {{ route("index.more", ['id' => $filme['id']]) }}"><i class="fas fa-angle-double-right"></i> </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection