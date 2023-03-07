<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="mail.css">
        <title>Presto.it</title>
    </head>
    <body>
        <div>
            <h1>L' Utente {{$user->name}} ti ha chiesto informazioni in merito al tuo annuncio su Presto.it</h1>
            
            <h2>Ecco i suoi dati</h2>
            <p>Email: {{$user->email}}</p>

            <h2>L'annuncio in questione è {{ $announcement->title }}</h2>
            
            <h2>Ci auguriamo che la tua Vendita vada a buon fine!</h2>
            
            
            <h2>Un Saluto dallo Staff di Presto.it</h2>
        </div>
        
    </body>
</html>