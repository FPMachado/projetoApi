<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Projeto API</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body class="bg-gray-900">
    <nav class="p-5 bg-black shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center text-yellow-500">
            <a href="{{ route('index') }}">
                <span class="hover:text-yellow-300 text-2xl font-sans cursor-pointer">
                    <i class="fas fa-home"></i>
                    <label class="font-sans cursor-pointer" for="">HOME</label> 
                </span>

                <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                    <i class="far fa-bars"></i>
                </span>
            </a>
        </div>
        <ul class="mt-0 md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-black text-yellow-500 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400] transition-all ease-in duration-500">
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-yellow-300 duration-500">Documentação</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-yellow-300 duration-500">Em breve</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-yellow-300 duration-500">Em breve</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href=" {{route('sobreMim')}} " class="text-xl hover:text-yellow-300 duration-500">Sobre Mim</a>
            </li> 

            {{-- <button class="bg-yellow-500 text-xl text-black font-sans duration-500 px-6 py-2 mx-4 hover:bg-yellow-300 rounded" href="{{route('login')}}">
                Sair
            </button> --}}

            <a href="{{route('login')}}">Login</a>

        </ul>
    </nav>


    <div>
        @yield('content')
    </div>

</body>
</html>