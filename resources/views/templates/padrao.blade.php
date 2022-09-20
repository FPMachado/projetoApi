<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <title>Projeto API</title>
</head>
<body>
    <div>
        <ul style='list-style-type: none;   margin: 0; padding: 0;'>
            <li style='display: inline;'><a href=" {{ route('index') }} ">Início</a></li>
            <li style='display: inline;'><a href="#">Em breve</a></li>
            <li style='display: inline; float:right'><a href="#" style=''>Sair</a></li>
        </ul>
    </div>
    <div>
        @yield('content')
    </div>
</body>
</html>