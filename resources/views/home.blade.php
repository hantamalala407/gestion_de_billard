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

            .form-container{
                position: relative;
                overflow: hidden;
                background-color: darkgrey;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
                width: 500px;
                height: 300px;
                justify-content: center;
                /*display: flex-start;*/
            }

            .form-container p{
                margin: 10px 0;
                font-size: 15px;
                color: white;
            }

            .form-container::before{
                content: '';
                position: absolute;
                top: -40%;
                left: -10%;
                width: 500px;
                height: 450px;
                background: linear-gradient(60deg,transparent,#d9138a,#d9138a);
                transform-origin: bottom-right;
                animation: animate 6s linear infinite;
            }
            .form-container::after{
                content: '';
                position: absolute;
                top: 50%;
                left: 40%;
                width: 500px;
                height: 450px;
                background: linear-gradient(60deg,transparent,#45f3ff,#45f3ff);
                transform-origin: bottom-right;
                animation: animate 6s linear infinite;
                animation-delay: -3s;
            }
            .form-container-traitement{
                position: absolute;
                inset: 2px;
                border-radius: 50px 5px;
                background: #23242d;
                z-index: 10;
                padding: 20px 10px;
                display: flex;
                flex-direction: column;
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


            .home-container{
                position: relative;
                width: 600px;
                height: 350px;
                background: #1c1c1c;
                border-radius: 50px 5px;
                overflow: hidden;
                text-align: center;
                justify-content: center;
            }
            .home-container::before{
                content: '';
                position: absolute;
                top: -40%;
                left: -10%;
                width: 500px;
                height: 450px;
                background: linear-gradient(60deg,transparent,#45f3ff,#45f3ff);
                transform-origin: bottom-right;
                animation: animate 6s linear infinite;
            }
            .home-container::after{
                content: '';
                position: absolute;
                top: 50%;
                left: 40%;
                width: 500px;
                height: 450px;
                background: linear-gradient(60deg,transparent,#d9138a,#d9138a);
                transform-origin: bottom-right;
                animation: animate 6s linear infinite;
                animation-delay: -3s;
            }

            form{
                position: absolute;
                inset: 2px;
                border-radius: 50px 5px;
                background: #23242d;
                z-index: 10;
                padding: 30px 30px;
                display: flex;
                flex-direction: column;
            }


            button{
                font-size: 15px;
                border: none;
                outline: none;
                /*background: #45f3ff;*/
                background: linear-gradient(90deg,#45f3ff,#d9138a);
                padding: 5px;
                border-radius: 90px;
                font-weight: 600;
                cursor: pointer;
            }
            
            button a{    
                text-decoration: none;
                color: #0d0b20;
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

        <div class="home-container">
            <form action="">
                <div class="logo" style="align-items: center; text-align: center">
                    <img src="images/logo_IDEA.png" alt="">
                </div>
                <div>
                    <h5>Bienvenue sur l'application de gestion d'événements</h5>
                </div>
                <div class="form-container">
                    <div class="form-container-traitement">
                        <div>
                            <b><p style="color: darkgrey;">Identifiez-vous si vous avez un compte</p></b>
                        </div>
                        <div class="links">
                            <button><a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a></button>
                        </div>
                    </div>
                </div>
                <div>
                    <h6>Impulse Digital Experience Agency - Madagascar</h6>
                </div>
            </form>
        </div>


    </body>
    
    </html>