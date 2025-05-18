
<!DOCTYPE html>
<html lang="en">
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
			<h1>Create Account</h1>

			<span>or use your email for registration</span>
			<input type="text" placeholder="Name"   name="name" />
			<input type="email" placeholder="Email"   name="email" />
			<input type="password" placeholder="Password"   name="password" />
            <input type="password" name="password_confirmation" placeholder="Confirmer mot de passe" required>

			<button type="submit">Sign Up</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
        <form method="POST" action="{{ route('loginPost') }}">
            @csrf
			<h1>Sign in</h1>

			<span>or use your account</span>

            <input id="email" type="email" placeholder="Email" name="email" required autofocus>
            <input id="password" type="password" name="password" placeholder="Password" required>
			<a href="#">Forgot your password?</a>
			<button type="submit">Sign In</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src ="js/auth.js"></script>
</body>
</html>
