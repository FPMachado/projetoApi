@extends('templates.padrao')

@section('content')
    <hr>
    <form action=" {{ route('index.search') }} " method="post">
        @csrf
        <input type="text" name="pesquisa" placeholder="Digite o nome do filme">
        <button type="submit">Pesquisar</button>
    </form>

    <h1>Principais Filmes</h1>

    <table>
        <thead>
            <tr>
                <th>Nota</th>
                <th>Nome</th>
                <th>Utilitários</th>
            </tr>
        </thead>
        @foreach ($filmes as $filme)
            <tr>
                <td> {{ $filme['vote_average']}} </td>
                <td> {{ $filme['title'] }} </td>
                <td title='Mais Informações sobre o filme'> <a href=" {{ route("index.more", ['id' => $filme['id']]) }}"><i class="fas fa-angle-double-right"></i> </a></td>
            </tr>
        @endforeach
    </table>
@endsection