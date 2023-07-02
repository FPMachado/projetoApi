@extends('templates.padrao')

@section('content')
    <div class="container mx-auto py-2 w-full bg-gray-700 rounded-lg mt-3">
        <h1 class="text-center text-yellow-500 text-2xl">Administração</h1>

        <div class="display flex w-full">
            <div class="ml-3" style="width: 350px;">
                <h2 class=" text-yellow-500 text-xl text-center">Menu do Administrador</h2>
                <hr>
                <ul class="mt-2">
                    <a href="{{route('admin.users')}}"><li class="text-yellow-500">Listar Usuários</li></a>

                </ul>
            </div>

            @if (!empty($users))
            <div class="bg-slate-100" style="margin-top: 36px; margin-left: 30px; margin-right: 10px; width: 90%;">
                <table class="w-full text-sm text-left bg-gray-500 border-collapse border border-black">
                    <thead class="bg-yellow-500 border-collapse border border-black text-xs uppercase text-center">
                        <tr class="border-collapse border border-black">
                            <th scope="col" class="py-3 px-3">Id</th>
                            <th scope="col" class="py-3 px-3">Nome</th>
                            <th scope="col" class="py-3 px-3">Sobrenome</th>
                            <th scope="col" class="py-3 px-3">Email</th>
                        </tr>
                    </thead>
                    @foreach ($users as $user)
                        <tbody class="text-xl border-collapse border border-black">  
                            <tr class=" hover:bg-yellow-500 rounded border-collapse border border-black">
                                <td class="text-center"> {{ $user['id']}} </td>
                                <td> {{ $user['name']}} </td>
                                <td class="text-center"> {{ $user['last-name'] }} </td>
                                <td> {{ $user['email'] }} </td>
                                {{-- <td class="text-center"> {{ (array_key_exists('release_date', $movie)) ? date('d/m/Y', strtotime($movie['release_date'])) : "" }} </td> --}}
                                {{-- <td class="text-center" title='Mais Informações sobre o filme'> <a href=" {{ route("movie.show", ['movie' => $movie['id']]) }}"><i class="fas fa-info-circle"></i></a></td> --}}
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            @endif
    

        </div>

        
    </div>
@endsection