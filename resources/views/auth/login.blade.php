<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

</head>
<body>
    
    <div id="message" class="alert" style="display: none;"></div>
    
    <div class="auth-container">


        <form id="loginForm" action="{{ route('login') }}" method="POST" onsubmit="return handleLogin(event)">
            @csrf
            <h2>Login</h2>
            <div class="inputBox">
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                <span for="email">Email:</span>
                <i></i>
            </div>
            <div class="inputBox">
                <input type="password" id="password" name="password" required>
                <span for="password">Mot de passe:</span>
                <i></i>
            </div>
            <button type="submit" style="border: none">Se connecter</button>
            <div class="links">
                <p>Vous n'avez pas de compte? <a href="{{ route('register') }}">S'enregistrer</a></p>
            </div>
        </form>
        
    </div>


<!--script>
    function handleLogin(event) {
        event.preventDefault(); // Empêche le formulaire de se soumettre normalement

        const form = document.getElementById('loginForm');
        const formData = new FormData(form);
        const messageElement = document.getElementById('message');

        fetch(form.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                messageElement.className = 'alert alert-success';
                messageElement.textContent = 'Connexion réussie!';
                messageElement.style.display = 'block';

                // Rediriger vers le tableau de bord après 2 secondes
                setTimeout(() => {
                    window.location.href = '/index';
                }, 2000);
            } else {
                messageElement.className = 'alert alert-danger';
                messageElement.textContent = data.message || 'Les informations de connexion ne correspondent pas à nos enregistrements.';
                messageElement.style.display = 'block';
            }
        })
        .catch(error => {
            messageElement.className = 'alert alert-danger';
            messageElement.textContent = 'Une erreur est survenue.';
            messageElement.style.display = 'block';
        });
    }
</script-->

<script>
    function handleLogin(event) {
    event.preventDefault(); // Empêche le formulaire de se soumettre normalement

    const form = document.getElementById('loginForm');
    const formData = new FormData(form);
    const messageElement = document.getElementById('message');

    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            messageElement.className = 'alert alert-success';
            messageElement.textContent = 'Connexion réussie!';
            messageElement.style.display = 'block';

            // Rediriger vers le tableau de bord après 2 secondes
            setTimeout(() => {
                window.location.href = '/index';
            }, 2000);
        } else {
            messageElement.className = 'alert alert-danger';
            messageElement.textContent = data.message || 'Les informations de connexion ne correspondent pas à nos enregistrements.';
            messageElement.style.display = 'block';
        }
    })
    .catch(error => {
        messageElement.className = 'alert alert-danger';
        messageElement.textContent = 'Une erreur est survenue.';
        messageElement.style.display = 'block';
    });
}

</script>

</body>
</html>
