@extends('templates.padrao')

@section('content')

    @include('mensagem')

    <div class="container mx-auto py-2 w-full bg-gray-700 rounded-lg mt-3">
        <h1 class="text-center text-yellow-500 text-2xl">Administração <i class="fas fa-cogs"></i></h1>

        <div class="display flex w-full">
            <div class="ml-3 drop-shadow-xl bg-gray-500 rounded-md" style="width: 25%; height: 135px; margin-top: 36px;">
                <h2 class=" text-yellow-500 text-xl text-center">Menu do Administrador</h2>
                <hr>
                <ul class="mt-2 ml-2">
                    <a href="{{route('admin.users')}}"><li class="text-yellow-500">Gerenciamento de Usuários</li></a>
                    <a href="{{route('admin.movies')}}"><li class="text-yellow-500">Gerenciamento de Filmes</li></a>
                    <a href=""><li class="text-yellow-500">Relatório de Usuários</li></a>
                    <a href="{{route('admin.movies.report')}}"><li class="text-yellow-500">Relatório de Filmes</li></a>
                </ul>
            </div>

            @if (!empty($users))
                @include('admin.users.adm-users')
            @endif

            @if (!empty($movies))
                @include('admin.movies.adm-movies')
            @endif

        </div>

    </div>
@endsection