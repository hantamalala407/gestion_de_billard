<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <!--div class="auth-container">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Register</h2>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
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
            <div class="form-group">
                <label for="password_confirmation">Confirm Password:</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>
            <button type="submit">Register</button>
            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </form>
    </div-->

    <div class="auth-container" style="height: 550px;">
        <form action="{{ route('register') }}" method="POST">
            @csrf
            <h2>Registre</h2>
            <div class="inputBox">
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                <span for="name">Nom:</span>
                <i></i>
                @error('name')
                    <!--span class="error">{{ $message }}</span-->
                @enderror
            </div>
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
                <span for="password">mot de passe:</span>
                <i></i>
                @error('password')
                    <!--span class="error">{{ $message }}</span-->
                @enderror
            </div>
            <div class="inputBox">
                <input type="password" id="password_confirmation" name="password_confirmation" required>
                <span for="password_confirmation">Confirm Password:</span>
                <i></i>
            </div>
            <button type="submit">S'enregistrer</button>
            <div class="links">
                <p>Avez-vous déjà un compte? <a href="{{ route('login') }}">Se connecter</a></p>
            </div>
        </form>
    </div>

</body>
</html>