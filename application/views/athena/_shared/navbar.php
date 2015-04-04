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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-database"></i> Configuration <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <?php echo View::factory('athena/_shared/configuration_nav')->render(); ?>
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