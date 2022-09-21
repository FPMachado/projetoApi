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
<body class="bg-gray-50">
    <nav class="p-5 bg-white shadow md:flex md:items-center md:justify-between">
        <div class="flex justify-between items-center">
            <a href="{{ route('index') }}">
                <span class="text-2xl font-[Poppins] cursor-pointer">
                    <i class="fas fa-home"></i>
                    Início
                </span>

                <span class="text-3xl cursor-pointer mx-2 md:hidden block">
                    <i class="far fa-bars"></i>
                </span>
            </a>
        </div>
        <ul class="md:flex md:items-center z-[-1] md:z-auto md:static absolute bg-white w-full left-0 md:w-auto md:py-0 py-4 md:pl-0 pl-7 md:opacity-100 opacity-0 top-[-400] transition-all ease-in duration-500">
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-cyan-500 duration-500">Em breve</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-cyan-500 duration-500">Em breve</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-cyan-500 duration-500">Em breve</a>
            </li> 
            <li class="mx-4 my-6 md:my-0">
                <a href="" class="text-xl hover:text-cyan-500 duration-500">Em breve</a>
            </li> 

            <button class="bg-cyan-400 text-xl text-white font-[Poppins] duration-500 px-6 py-2 mx-4 hover:bg-cyan-500 rounded">
                Sair
            </button>
        </ul>
    </nav>


    <div class="container mx-auto py-8">
        @yield('content')
    </div>



</body>
</html>