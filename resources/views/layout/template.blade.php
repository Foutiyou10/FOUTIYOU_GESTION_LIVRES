<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Site Laravel')</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }
        header nav {
            background-color: #1f2937;
            padding: 10px 20px;
        }
        header nav ul {
            list-style: none;
            display: flex;
            gap: 15px;
        }
        header nav ul li {
            display: inline;
        }
        header nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        footer {
            background-color: #e5e7eb;
            padding: 15px;
            text-align: center;
            margin-top: 40px;
        }
        .container {
            padding: 20px;
        }
    </style>
</head>
<body>

    <header>
        <nav>
            <ul>
                <li><a href="{{ url('/') }}">Accueil</a></li>
                <li><a href="{{ url('/about') }}">À propos</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
               
            </ul>
        </nav>
    </header>

    <div class="container">
        <!-- Zone personnalisable -->
        @yield('content')
        <!-- Fin zone personnalisable -->
    </div>

    <footer>
        <div>Le footer de mon site</div>
    </footer>
    
</body>
</html>
