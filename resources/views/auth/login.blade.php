<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/aut.css">
</head>
<body>

<div class="container" id="container">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <div class="form-container sign-up-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Créer un compte</h1>
            <span>ou utilisez votre email pour vous inscrire</span>
            <input type="text" placeholder="Nom" name="name" required/>
            <input type="email" placeholder="Email" name="email" required/>
            <input type="password" placeholder="Mot de passe" name="password" required/>
            <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>
            <button type="submit">S'inscrire</button>
        </form>
    </div>

    <div class="form-container sign-in-container">
        <form method="POST" action="{{ route('loginPost') }}">
            @csrf
            <h1>Se connecter</h1>
            <span>ou utilisez votre compte</span>
            <input id="email" type="email" placeholder="Email" name="email" required autofocus>
            <input id="password" type="password" name="password" placeholder="Mot de passe" required>
            <a href="#">Mot de passe oublié ?</a>
            <button type="submit">Se connecter</button>
        </form>
    </div>

    <div class="overlay-container">
        <div class="overlay">
            <div class="overlay-panel overlay-left">
                <h1>Bon retour !</h1>
                <p>Pour rester connecté avec nous, veuillez vous connecter avec vos informations personnelles</p>
                <button class="ghost" id="signIn">Se connecter</button>
            </div>
            <div class="overlay-panel overlay-right">
                <h1>Bonjour !</h1>
                <p>Entrez vos informations personnelles et commencez votre voyage avec nous</p>
                <button class="ghost" id="signUp">S'inscrire</button>
            </div>
        </div>
    </div>
</div>

<script src="js/auth.js"></script>
</body>
</html>