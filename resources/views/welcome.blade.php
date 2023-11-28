<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body class="container-fluid">

        <div class="navbar">
            <div class="container d-flex justify-content-between">
                <a href="/" class="navbar-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                    </svg>
                </a>

                <div class="d-flex align-items-center navbar-brand" >
                    <ul class="d-flex m-0">
                        <li><a href="/">Paisagem</a></li>
                        <li><a href="/">Natureza</a></li>
                        <li><a href="/">Animais</a></li>
                        <li><a href="/">Carros</a></li>
                    </ul>

                    <a href="/" style="color: black" class="border btn btn-light mR-32 mL-32">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-upload" viewBox="0 0 16 16">
                            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
                            <path d="M7.646 1.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 2.707V11.5a.5.5 0 0 1-1 0V2.707L5.354 4.854a.5.5 0 1 1-.708-.708z"/>
                        </svg>
                        <span class="mL-8">Fazer upload</span>
                    </a>

                    <div>
                        <a href="/login" class="btn btn-dark">Login</a>
                        <a href="/register" class="btn btn-outline-dark">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <h1 class="text-center mT-128 mB-32">Galeria de Imagens</h1>

            <form action="/" method="GET" class="d-flex pRL-128">
            
                <input type="text" class="form-control" placeholder="Search">

                <button type="submit" class="btn btn-outline-dark">Search</button>
            </form>
        </div>
    </body>
</html>