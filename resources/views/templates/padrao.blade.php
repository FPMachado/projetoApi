<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Projeto API</title>
    <link rel="stylesheet" href="{{ url('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="{{url('js/jquery.js')}}"></script>
</head>
<body class="bg-gray-900">
    <nav class="p-5 bg-black shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center text-yellow-500">
            <a href="{{ route('index') }}">
                <span class="hover:text-yellow-300 text-2xl font-sans cursor-pointer">
                    <i class="fas fa-home"></i>
                    <span class="font-sans cursor-pointer">HOME</span> 
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
            
            @if (Auth::check())
                <div class="relative">
                    <button class="bg-yellow-500 hover:bg-yellow-300 duration-500 border flex item-center border-gray-300 rounded px-3 py-2 font-semibold text-sm text-black shadow" onclick='userButton()'>Olá {{auth()->user()->name}} <i class="text-sm fas fa-chevron-down  w-3 h-3 ml-2"></i></button> 
                    <div id="dropDown" class="inline-block absolute bg-white border-gray-500 py-1 shadow-md rounded-md" style="width:137px;">
                        <a class="block text-sm text-black px-3 py-1 bg-white hover:bg-yellow-500 duration-500" href="">Minha Lista</a>
                        <a class="block text-sm text-black px-3 py-1 bg-white hover:bg-yellow-500 duration-500" href="{{route('logout')}}">Sair</a>
                    </div>
                </div>
            @else
                <form action="{{route('login')}}" method="GET">
                    @csrf
                    <button class="bg-yellow-500 text-xl text-black font-sans duration-500 px-6 py-2 mx-4 hover:bg-yellow-300 rounded">
                        Login
                    </button>        
                </form>
            @endif

        </ul>
    </nav>


    <div>
        @yield('content')
    </div>

</body>
</html>