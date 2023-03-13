<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Presto.it</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- AOS CDN --}}
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        @livewireStyles

{{-- DA RIVEDERE CON GIOVANNI MIN 16:05 USER STORY 7 --}}

<link rel="stylesheet" href="https://cdnjs.cloudfire.com/ajax/libs/front-awesome/6.0.0/css/all.min.css">




    </head>
    <body>
        
            
        
            {{ $slot }}
        
        @livewireScripts

        <x-footer></x-footer>

        {{-- AOS CDN Scripts --}}
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        {{-- Aos Init --}}
        <script>
            AOS.init();
        </script>



    </body>
</html>