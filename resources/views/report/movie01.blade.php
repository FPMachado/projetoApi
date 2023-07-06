<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório de Filmes</title>
</head>
<body style="font-family:Verdana, Geneva, Tahoma, sans-serif">
    <div>
        <img src="../storage/app/public/header.jpg" alt="" width="100%">
    </div>

    <h3 style="text-align: center">Relatório de Filmes</h3>

    <table style="border-spacing: 0;  border: 1px solid; width:100%;  margin: 0 auto; margin-top: 5px;">
        <thead style="text-align: center; background-color: rgb(146, 148, 147); font-weight: bold;">
            <tr>
                <td style="border: 1px solid; width: 30px;">Id</td>
                <td style="border: 1px solid; width: 40px;">Nota</td>
                <td style="border: 1px solid; width:300px;">Nome</td>
                <td style="border: 1px solid; width:100px;">Data de Lançamento</td>
                <td style="border: 1px solid; width:100px;">Atualizado Em</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($movies as $movie)
                <tr>
                    <td style="border: 1px solid; text-align: center;">{{$movie->id}}</td>
                    <td style="border: 1px solid; text-align: center;">{{number_format($movie->note, 2)}}</td>
                    <td style="border: 1px solid;">{{$movie->name}}</td>
                    <td style="border: 1px solid; text-align: center;">{{date("d/m/Y", strtotime($movie->release_date))}}</td>
                    <td style="border: 1px solid; text-align: center;">{{date("d/m/Y", strtotime($movie->updated_at))}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
<footer>
    Teste
</footer>
</html>