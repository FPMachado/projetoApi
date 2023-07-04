<div class="drop-shadow-lg bg-gray-500 px-2 py-2 rounded-md" style="margin-top: 36px; margin-left: 30px; margin-right: 10px; width: 90%;">
    <div class="text-right mt-3 mb-3">
        <form action=" {{route('admin.users.search')}} " method="post">
            @csrf
            <input class="border border-black text-xl px-6 py-2 rounded-md w-80" type="text" name="search" placeholder="Pesquise o nome do usuário" value="{{old('search')}}">
            <button type="submit" class="bg-yellow-500 text-xl text-black font-sans duration-500 px-6 py-2 hover:bg-yellow-300 rounded">Pesquisar</button>
        </form>
    </div>
    <table class="w-full text-sm text-left bg-gray-500 border-collapse border border-black">
        <thead class="bg-yellow-500 border-collapse border border-black text-xs uppercase text-center ">
            <tr class="border-collapse border border-black divide-x divide-black">
                <th scope="col" class="py-3 px-3">Id</th>
                <th scope="col" class="py-3 px-3">Nome</th>
                <th scope="col" class="py-3 px-3">Sobrenome</th>
                <th scope="col" class="py-3 px-3">Email</th>
                <th scope="col" class="py-3 px-3">Opções</th>
            </tr>
        </thead>
        @if (!empty($users->total))
            @foreach ($users as $user)
                <tbody class="text-xl border-collapse border border-black">  
                    <tr class=" hover:bg-yellow-500 rounded border-collapse border border-black divide-x divide-black">
                        <td class="text-center"> {{ $user['id']}} </td>
                        <td> {{ $user['name']}} </td>
                        <td class="text-center"> {{ $user['last_name'] }} </td>
                        <td> {{ $user['email'] }} </td>
                        <form action="{{route('admin.users.delete', ['id' => $user['id']]) }}" method="post">
                            <input type="hidden" name="user_id" value="{{$user['id']}}">
                            @csrf @method('DELETE')
                                <td class="text-center" title="Excluir Usuário"> 
                                    <button type="submit" title="Excluir usuário"><i class="fas fa-times"></i></button> 
                                </td>
                        </form>
                    </tr>
                </tbody>
            @endforeach
        @else
            <tbody class="text-xl">
                <tr>
                    <td class="text-center py-2" colspan="5">Nenhum Usuário Encontrado</td>
                </tr>
            </tbody>
        @endif
    </table>
    @if (!empty($users))
        {{$users->links()}}
    @endif
</div>