<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <!--div class="auth-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
        </form>
    </div-->
    <div class="auth-container">
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <h2>Login</h2>
            <!--div class="form-group"-->
            <div class="inputBox">
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                <span for="email">Email:</span>
                <i></i>
                @error('email')
                    <!--span class="error">{{ $message }}</span-->
                @enderror
            </div>
            <div class="inputBox">
                <input type="password" id="password" name="password" required>
                <span for="password">Mot de passe:</span>
                <i></i>
                @error('password')
                    <!--span class="error">{{ $message }}</span-->
                @enderror
            </div>
            <button type="submit">Se connecter</button>
            <div class="links">
                <p>Vous n'avez pas de compte? <a href="{{ route('register') }}">S'enregistrer</a></p>
            </div>
        </form>
    </div>
</body>
</html>