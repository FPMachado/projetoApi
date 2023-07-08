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
                <td style="border: 1px solid; width: 10px;">Id</td>
                <td style="border: 1px solid; width: 170px;">Nome</td>
                <td style="border: 1px solid; width:80px;">Email</td>
                <td style="border: 1px solid; width:100px;">Verificado Em</td>
                <td style="border: 1px solid; width:100px;">Recebe E-mails</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td style="border: 1px solid; text-align: center;">{{$user->id}}</td>
                    <td style="border: 1px solid; text-align: center; width: 170px;">{{$user->name . $user->last_name}}</td>
                    <td style="border: 1px solid;">{{$user->email}}</td>
                    <td style="border: 1px solid; text-align: center;">{{!empty($user->email_verified_at) ? date("d/m/Y", strtotime($user->email_verified_at)) : ""}}</td>
                    <td style="border: 1px solid; text-align: center;">{{($user->recive_email == 't') ? "Sim" : "Não"}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>