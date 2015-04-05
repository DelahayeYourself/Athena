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
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="public/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="public/css/bootstrap-markdown.min.css" />
        <link rel="stylesheet" href="public/css/select2.css" />
        <link rel="stylesheet" href="public/css/select2-bootstrap.css" />
        <style>
            body {
                padding-top: 65px;
                font-family: 'Open Sans', sans-serif;
            }
            .btn{
                cursor: pointer;
            }
            .dropdown .fa, .nav-stacked.well .fa{
                width: 19px;
            }
            .nav-stacked.well .dropdown-header{
                padding-left: 0;
                font-size: 13px;
                font-weight: bold;
            }
        </style>

    </head>

    <body>
        
        <?php echo View::factory('athena/_shared/navbar')->render(); ?>

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
        <script src="public/js/bootstrap-markdown.fr.js"></script>
        <script src="public/js/select2.min.js"></script>
        <script src="public/js/select2_locale_fr.js"></script>
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
                $(".select2").select2();
            });
        </script>
    </body>
</html>
