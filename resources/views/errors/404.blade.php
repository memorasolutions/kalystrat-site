<!DOCTYPE html>
<html lang="fr">
<!-- Author: MEMORA solutions, https://memora.solutions ; info@memora.ca -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page introuvable - Kalystrat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Akzidenz Grotesk', 'Helvetica Neue', Arial, sans-serif;
            background-color: #0A1628;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2rem;
        }
        .logo {
            max-width: 200px;
            margin-bottom: 2rem;
        }
        .error-code {
            color: #B8A472;
            font-size: 8rem;
            font-weight: bold;
            margin: 0;
        }
        .error-message {
            color: white;
            font-size: 1.5rem;
            margin-top: 0.5rem;
        }
        .error-submessage {
            color: rgba(255,255,255,0.7);
            margin-top: 0.5rem;
            font-size: 1.1rem;
        }
        .home-button {
            display: inline-block;
            background-color: #B8A472;
            color: #0A1628;
            padding: 12px 32px;
            border-radius: 4px;
            text-decoration: none;
            font-weight: 500;
            margin-top: 2rem;
            transition: background-color 0.3s ease;
        }
        .home-button:hover {
            background-color: #9E8A5E;
        }
        .footer {
            color: rgba(255,255,255,0.4);
            margin-top: 3rem;
            font-size: 0.85rem;
        }
    </style>
</head>
<body>
    <img src="{{ asset('assets/img/kalystrat/logo-white.svg') }}" alt="Kalystrat" class="logo">

    <h1 class="error-code">404</h1>
    <p class="error-message">Page introuvable</p>
    <p class="error-submessage">La page que vous recherchez n'existe pas ou a été déplacée.</p>

    <a href="{{ url('/') }}" class="home-button">Retour à l'accueil</a>

    <div class="footer">
        © {{ date('Y') }} Kalystrat
    </div>
</body>
</html>
