<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Connexion - IDEA</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

            <!-- Font awesome CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    
        <style>

            @media screen and (min-width: 560px){
                body {
                    display: flex;
                    width: 100%;
                }
            }

            body {
                font-weight: lighter;
                font-family: Poppins, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
                background-color: #f9f9f9;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
                background: #0d0b20;
                color: #8f8f8f;
            }

            .container{
                background-color: darkgrey;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 500px;
            }

            .container p{
                margin: 10px 0;
                font-size: 15px;
                color: white;
            }

            h6{
                margin-top: 15px;
                text-align: center;
            }

            h5{
                margin-bottom: 15px;
                margin-top: 15px;
                text-align: center;
            }

            .logo img{
                max-width: 170px;
                text-align: center;
            }

            .all1::before{
                content: '';
                position: absolute;
                /*top: 50%;*/
                /*left: 50%;*/
                right: 75%;
                bottom: 50%;
                width: 250px;
                height: 250px;
                background: linear-gradient(60deg,transparent,#45f3ff,#45f3ff);
                transform-origin: bottom-right;
                animation: animate 6s linear infinite;
            }
            .all1::after{
                content: '';
                position: absolute;
                /*top: 50%;
                left: 50%;*/
                left: 75%;
                bottom: 10%;
                width: 250px;
                height: 250px;
                background: linear-gradient(60deg,transparent,#d9138a,#d9138a);
                transform-origin: bottom-right;
                animation: animate 6s linear infinite;
                animation-delay: -3s;
            }

            .links{
                border: 2px solid #f9f9f9;
                background: #f9f9f9;
                margin-bottom: 10px;
                padding-top: 10px;
                padding-bottom: 10px;
                border-radius: 10px;
                margin-left: 200px;
                margin-right: 200px;
            }
            .links:hover{
                background: #0d0b20;
                border: #0d0b20;
            }

            .links a{
                margin: 25px 0;
                font-size: 1em;
                color: #0d0b20;
                text-decoration: none;
            }

            .links a:hover{
                color: #45f3ff;
            }
            .links a:nth-child(1):hover{
                /*text-decoration: underline 2px;*/
                text-underline-offset: 5px;
            }

            @keyframes animate 
            {
                0%{
                    transform: rotate(0deg);
                }
                100%{
                    transform: rotate(360deg);
                }
            }

            @media screen and (max-width: 560px){
                body {
                    width: 100%;
                }
            }
            
        </style>
    
    </head>
    
    <body>

        <div class="all1">
            <div class="logo" style="align-items: center; text-align: center">
                <img src="images/logo_IDEA.png" alt="">
            </div>
            <div>
                <h5>Bienvenue sur l'application de gestion d'utilisateur</h5>
            </div>
            <div class="container">
                <div class="form-container">
                    <p>Identifiez-vous si vous avez un compte</p>
                </div>
                <div class="links">
                    <a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a>
                </div>
            </div>
            <div>
                <h6>Impulse Digital Experience Agency - Madagascar</h6>
            </div>
        </div>


    </body>
    
    </html>