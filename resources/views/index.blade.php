@extends('templates.padrao')

@section('content')
    <hr>
    <form action=" {{ route('index.search') }} " method="post">
        @csrf
        <input type="text" name="pesquisa" placeholder="Digite o nome do filme">
        <button type="submit">Pesquisar</button>
    </form>

    <h1>Principais Filmes</h1>
    <table style='border: 1px solid black; border-collapsse: collapse;'>
        <tr>
            <th style='border: 1px solid black; border-collapsse: collapse;'>Nota</th>
            <th style='border: 1px solid black; border-collapsse: collapse;'>Nome</th>
            <th style='border: 1px solid black; border-collapsse: collapse;' colspan="2">Utilitários</th>
        </tr>
        @foreach ($filmes as $filme)
            <tr style='border: 1px solid black; border-collapsse: collapse;'>
                <td style='border: 1px solid black; border-collapsse: collapse;'> {{ $filme['vote_average']}} </td>
                <td style='border: 1px solid black; border-collapsse: collapse;'> {{ $filme['title'] }} </td>
                <td style='border: 1px solid black; border-collapsse: collapse; text-align: center;' title='Mais Informações obre o filme'> <a href=" {{ route("index.more", ['id' => $filme['id']]) }}"><i class="fas fa-angle-double-right"></i> </a></td>
            </tr>
        @endforeach
    </table>
@endsection