<h1>Principais Filmes</h1>
<hr>
<form action=" {{ route('teste.search') }} " method="post">
    @csrf
    <input type="text" name="pesquisa" placeholder="Digite o nome do filme">
    <button type="submit">Pesquisar</button>
</form>

@foreach ($filmes as $filme)
    <p> {{ $filme['title'] }} </p>
@endforeach