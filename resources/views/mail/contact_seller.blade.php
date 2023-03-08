<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Presto.it</title>
    </head>
    <body>
        <style>
            body {
                background: rgb(236,139,42);
                background: linear-gradient(140deg, rgba(236,139,42,1) 50%, rgba(255,192,81,1) 100%);
            }
            
        </style>
        <div>
            <h1>L' Utente {{$data['name']}} ti ha chiesto informazioni in merito al tuo annuncio su Presto.it</h1>
            
            <h2>Ecco i suoi dati:</h2>
            <p>Email: {{$data['email']}}</p>
            
            <h2>L annuncio in questione è {{$data['titolo']}}</h2>

        
            
            <h2>Ci auguriamo che la tua Vendita vada a buon fine!</h2>
            <h2>Un Saluto dallo Staff di Presto.it</h2>
        </div>
        
    </body>
</html>