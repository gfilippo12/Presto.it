<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Presto.it</title>
</head>
<body>
    <div>
        <h1>L' Utente {{$user->name}} ti ha chiesto informazioni in merito al tuo annuncio su Presto.it</h1>
        
        <h2>Ecco i suoi dati</h2>
        <p>Email: {{$user->email}}</p>
        
    </div>
    
</body>
</html>