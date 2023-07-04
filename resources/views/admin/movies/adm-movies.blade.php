<div class="drop-shadow-lg bg-gray-500 px-2 py-2 rounded-md" style="margin-top: 36px; margin-left: 30px; margin-right: 10px; width: 90%;">
    <div class="text-right mt-3 mb-3">
        <form action="  " method="post">
            @csrf
            <input class="border border-black text-xl px-6 py-2 rounded-md w-80" type="text" name="search" placeholder="Pesquise o nome do filme" value="{{old('pesquisa')}}">
            <button type="submit" class="bg-yellow-500 text-xl text-black font-sans duration-500 px-6 py-2 hover:bg-yellow-300 rounded">Pesquisar</button>
        </form>
    </div>
    <table class="w-full text-sm text-left bg-gray-500 border-collapse border border-black">
        <thead class="bg-yellow-500 border-collapse border border-black text-xs uppercase text-center ">
            <tr class="border-collapse border border-black divide-x divide-black">
                <th scope="col" class="py-3 px-3">Id</th>
                <th scope="col" class="py-3 px-3">Nome</th>
                <th scope="col" class="py-3 px-3">Data de Lançamento</th>
                <th scope="col" class="py-3 px-3">Opções</th>
            </tr>
        </thead>
        @if (!empty($movies->total))
            @foreach ($movies as $movie)
                <tbody class="text-xl border-collapse border border-black">  
                    <tr class=" hover:bg-yellow-500 rounded border-collapse border border-black divide-x divide-black">
                        <td class="text-center"> {{ $movie['id']}} </td>
                        <td> {{ $movie['name']}} </td>
                        <td> {{ date('d/m/Y', strtotime($movie['release_date'])) }} </td>
                        <form action="{{route('admin.movies.update', ['id' => $movie['id']]) }}" method="post">
                            <input type="hidden" name="movie_id" value="{{$movie['id']}}">
                            @csrf @method('PUT')
                                <td class="text-center" title="Atualizar Filme"> 
                                    <button type="submit" title="Atualizar informações do filme"><i class="fas fa-sync-alt"></i></button> 
                                </td>
                        </form>
                    </tr>
                </tbody>
            @endforeach
        @else
            <tbody class="text-xl">
                <tr>
                    <td class="text-center py-2" colspan="5">Nenhum Filme Encontrado</td>
                </tr>
            </tbody>
        @endif
    </table>
    @if (!empty($users))
        {{$movies->links()}}
    @endif
</div>