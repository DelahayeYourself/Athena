<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <base href="<?php echo URL::base(TRUE); ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title><?php echo APP_NAME; ?> > Auth</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <style>
            body {
                padding-top: 40px;
                padding-bottom: 40px;
                background-color: #fff;
                font-family: 'Open Sans', sans-serif;
            }

            .btn{
                cursor: pointer;
            }

            .form-signin {
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
            }
            .form-signin-heading {
                margin: 0 0 15px;
                font-size: 18px;
                font-weight: 400;
                color: #555;
            }
            .form-signin .checkbox {
                margin-bottom: 10px;
                font-weight: normal;
            }
            .form-signin .form-control {
                position: relative;
                height: auto;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
                padding: 10px;
                font-size: 16px;
            }
            .form-signin .form-control:focus {
                z-index: 2;
            }
            .form-signin input[type="text"] {
                margin-bottom: 10px;
            }
            .form-signin input[type="password"] {
                margin-bottom: 10px;
            }
            .card {
                width: 304px;
                padding: 20px 25px 30px;
                margin: 0 auto 25px;
                background-color: #f7f7f7;
                border-radius: 2px;
                -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, .3);
                box-shadow: 0 2px 2px rgba(0, 0, 0, .3);
            }
            .card-signin {
                width: 354px;
                padding: 40px;
            }
            .card-signin .profile-img {
                display: block;
                width: 96px;
                height: 96px;
                margin: 0 auto 10px;
            }
            h1{
                text-transform: capitalize;
            }

        </style>
    </head>

    <body>

        <div class="container">
            <h1 class="text-center"><?php echo APP_NAME; ?></h1>
            <h2 class="form-signin-heading text-center">Sign in with your Account</h2>

            <div class="card card-signin">
                <img class="img-circle profile-img" src="public/imgs/Athena.jpg" alt="">
                <form class="form-signin" method="post">
                    <label for="inputUsername" class="sr-only">Username</label>
                    <input type="text" id="inputUsername" class="form-control" placeholder="Nom d'utilisateur" required autofocus name="username">
                    <label for="inputPassword" class="sr-only">Password</label>
                    <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required name="password">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Connexion permanente
                        </label>
                        <a class="pull-right">Besoin d'aide ?</a>

                    </div>

                </form>
                <?php foreach (Notices::get() as $notice): ?>
                    <div class="alert alert-<?php echo $notice['type']; ?>">
                        <p><?php echo $notice['key']; ?></p>
                    </div>
                <?php endforeach; ?>
                <?php if (count($errors)): ?>
                    <div class="alert alert-warning">
                        <p>Votre tentative de connexion a échoué.</p>
                        <p>Assurez-vous d'avoir saisi correctement votre identifiant et votre mot de passe puis réessayez.</p>
                    </div>
                <?php endif; ?>
            </div>
            <p class="text-center">
                <a href="<?php echo Route::get('signup')->uri(); ?>">Créer mon compte</a>
            </p> 
        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

