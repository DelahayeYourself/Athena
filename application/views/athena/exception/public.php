<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <base href="<?php echo URL::base(TRUE); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="favicon.ico">

        <title><?php echo APP_NAME; ?> Oops!</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>

        <style>
            body {
                padding-top: 65px;
                font-family: 'Open Sans', sans-serif;
            }
            .btn{
                cursor: pointer;
            }
            .container{
                text-align: center;
            }
            h1{
                font-size: 102px;
            }
            h2{
                font-size: 44px;
            }
        </style>

    </head>

    <body>
        <div class="container">
            <h1>Oops!</h1>
            <h2>404 Not Found</h2>
            <p>Sorry, an error has occured, Requested page not found!</p>
            <a href="" class="btn btn-success"><i class="glyphicon glyphicon-chevron-left"></i> Back to home</a> 
            <a href="" class="btn btn-default"><i class="glyphicon glyphicon-envelope"></i> Contact support</a> 
        </div>

    </body>
</html>
