<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto</title>
    
</head>

<body>
     <div>
    <h1>Un utente ha chiesto di lavorare con noi</h1>
    <h2>Ecco i suio dati:</h2>
    <p>Nome: {{ $user->name }}</p>
    <p>Nome: {{ $user->email }}</p>
    <p>Se vuio renderl* revisor, clicca  qui</p>
    <a href="{{ route('make.revisor', compact('user')) }}">Rendi revisor</a>
</div>

</body>

</html>