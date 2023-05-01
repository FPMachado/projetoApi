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
            <a href="{{ route('movie.index') }}">
                <span class="hover:text-yellow-300 text-2xl font-sans cursor-pointer">
                    <i class="fas fa-home"></i>
                    <span class="text-2xl cursor-pointer">HOME</span>
                </span>
            </a>
        </div>
        <ul class="mt-0 md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-black text-yellow-500 w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400] transition-all ease-in duration-500">
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-yellow-300 duration-500">Documentação</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href=" {{route('sobreMim')}} " class="text-xl hover:text-yellow-300 duration-500">Sobre Mim</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href=" {{ route('register') }} " class="text-xl hover:text-yellow-300 duration-500">Criar conta</a>
            </li> 
        </ul>
    </nav>

    <div>
        @yield('content')
    </div>

</body>
</html>