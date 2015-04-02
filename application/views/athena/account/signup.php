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

        <title><?php echo APP_NAME; ?> > Signup</title>

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
                max-width: 530px;
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
                width: 504px;
                padding: 20px 25px 30px;
                margin: 0 auto 25px;
                background-color: #f7f7f7;
                border-radius: 2px;
                -webkit-box-shadow: 0 2px 2px rgba(0, 0, 0, .3);
                box-shadow: 0 2px 2px rgba(0, 0, 0, .3);
            }
            .card-signin {
                width: 554px;
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
            <h2 class="form-signin-heading text-center">Créer votre compte <?php echo APP_NAME; ?></h2>

            <div class="card card-signin">
                <form class="form-signin" method="post">

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'firstname') ?>">
                        <?php echo Form::label('firstname', 'Prénom', array('class' => 'control-label')); ?>
                        
                        <?php echo Athena_Form::renderErrorMessage($errors, 'firstname'); ?>
                        
                        <?php echo Form::input('firstname', $user->firstname, array('class' => 'form-control', 'id' => 'firstname', 'placeholder' => 'Prénom', 'type' => 'text', 'required' => 'required')); ?>
                    </div>

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'name') ?>">
                        <?php echo Form::label('name', 'Nom', array('class' => 'control-label')); ?>
                        
                        <?php echo Athena_Form::renderErrorMessage($errors, 'name'); ?>
                        
                        <?php echo Form::input('name', $user->name, array('class' => 'form-control', 'id' => 'name', 'placeholder' => 'Nom', 'type' => 'text', 'required' => 'required')); ?>
                    </div>

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'email') ?>">
                        <?php echo Form::label('email', 'Email', array('class' => 'control-label')); ?>
                        
                        <?php echo Athena_Form::renderErrorMessage($errors, 'email'); ?>
                        
                        <?php echo Form::input('email', $user->email, array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'type' => 'email', 'required' => 'required')); ?>
                    </div>

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'phone') ?>">
                        <?php echo Form::label('phone', 'Numéro de téléphone', array('class' => 'control-label')); ?>
                        
                        <?php echo Athena_Form::renderErrorMessage($errors, 'phone'); ?>
                        
                        <?php echo Form::input('phone', $user->phone, array('class' => 'form-control', 'id' => 'phone', 'placeholder' => 'Numéro de téléphone', 'type' => 'text', 'required' => 'required')); ?>
                    </div>

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'username') ?>">
                        <?php echo Form::label('username', 'Nom d\'utilisateur', array('class' => 'control-label')); ?>
                        
                        <?php echo Athena_Form::renderErrorMessage($errors, 'username'); ?>
                        
                        <?php echo Form::input('username', $user->username, array('class' => 'form-control', 'id' => 'username', 'placeholder' => 'Nom d\'utilisateur', 'type' => 'text', 'required' => 'required')); ?>
                    </div>

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'parcour_id') ?>">
                        <?php echo Form::label('parcour_id', 'Année suivie', array('class' => 'control-label')); ?>
                        <?php echo Form::select('parcour_id', $parcours, $user->parcour_id, array('class' => 'form-control', 'id' => 'parcour_id')); ?>
                    </div>

                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'password') ?>">

                        

                        <?php echo Form::label('password', 'Mot de passe', array('class' => 'control-label')); ?>
                        
                        <?php echo Athena_Form::renderErrorMessage($errors, 'password'); ?>
                        
                        <?php echo Form::input('password', null, array('class' => 'form-control', 'id' => 'password', 'placeholder' => 'Mot de passe', 'type' => 'password', 'required' => 'required')); ?>
                    </div>


                    <button class="btn btn-lg btn-primary btn-block" type="submit">Créer mon compte</button>



                </form>
            </div>
        </div> <!-- /container -->


        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>

