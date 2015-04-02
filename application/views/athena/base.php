<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <base href="<?php echo URL::base(TRUE); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title><?php echo APP_NAME; ?></title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="public/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="public/css/bootstrap-markdown.min.css" />
        <style>
            body {
                padding-top: 65px;
                font-family: 'Open Sans', sans-serif;
            }
            .btn{
                cursor: pointer;
            }
        </style>

    </head>

    <body>

        <!-- Fixed masthead -->
        <nav class="navbar navbar-masthead navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=""><?php echo APP_NAME; ?></a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Configuration <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-header">Utilisateurs</li>
                                <li><a href="<?php echo Route::get('users')->uri(array('action' => 'lists', 'id' => 'etudiant')); ?>">Étudiants</a></li>
                                <li><a href="<?php echo Route::get('users')->uri(array('action' => 'lists', 'id' => 'admin')); ?>">Administrateurs</a></li>
                                <li><a href="<?php echo Route::get('users')->uri(); ?>">Utilisateurs (For debug purpose)</a></li>
                                <li class="dropdown-header">Paramètres</li>
                                <li><a href="<?php echo Route::get('periodes')->uri(); ?>">Periodes</a></li>
                                <li><a href="<?php echo Route::get('mentions')->uri(); ?>">Mentions</a></li>
                                <li><a href="<?php echo Route::get('specialites')->uri(); ?>">Spécialités</a></li>
                                <li><a href="<?php echo Route::get('parcours')->uri(); ?>">Parcours</a></li>
                                <li><a href="<?php echo Route::get('modules')->uri(); ?>">Modules</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <?php if (Auth::instance()->logged_in()): ?>
                            <li class="active"><a href="">Salutations <?php echo Auth::instance()->get_user()->firstname; ?></a></li>
                            <li><a href="<?php echo Route::get('account')->uri(array('action' => 'logout')); ?>">Quitter</a></li>
                        <?php endif; ?>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </nav>

        <div class="container">

            <?php echo $content; ?>

        </div> <!-- /container -->



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>-->
        <script src="public/js/bootstrap.js"></script>
        <script src="public/js/moment.js"></script>
        <script src="public/js/moment.fr.js"></script>
        <script src="public/js/markdown.js"></script>
        <script src="public/js/to-markdown.js"></script>
        <script src="public/js/datetimepicker.js"></script>
        <script src="public/js/bootstrap-markdown.js"></script>
        <script src="public/js/bootstrap-markdown.fr.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {

                $(".user-confirm-action-delete").click(function (e) {
                    e.preventDefault();
                    var $link = $(this);
                    if (confirm("Etes vous sûr de vouloir supprimer cet élément ?")) {
                        document.location.assign("/" + $link.attr('href'));
                    }
                });

                $('.datetimepicker').datetimepicker({
                    locale: 'fr',
                    dayViewHeaderFormat: 'MMMM YYYY',
                    format: 'DD.MM.YYYY HH:mm'
                });

                $(".markdown-editor").markdown({language: 'fr'})
            });
        </script>
    </body>
</html>
