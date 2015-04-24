<div class="row">
    <h1>Salutations <?php echo Auth::instance()->get_user(); ?></h1>
    <div class="alert alert-info">
        <p><strong><?php echo __('welcome.title'); ?></strong> <?php echo __('welcome.text.student'); ?></p>
        <p>
            <?php echo __('student.actual.parcour'); ?> &laquo;<strong> <?php echo Auth::instance()->get_user()->parcour; ?></strong> &raquo;
        </p>
    </div>

    <hr/>

    <h2><?php echo __('student.choise.title'); ?></h2>
    
    <hr/>


    <?php foreach ($periodes as $periode): ?>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><?php echo $periode->name; ?></div>
                <div class="panel-body">
                   <?php foreach(Auth::instance()->get_user()->parcour->getGroupesForPeriode($periode)  as $groupe): ?>
                        <?php echo $groupe->module->name; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            
        </div>
    <?php endforeach; ?>

</div>