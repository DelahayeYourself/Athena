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

                    <?php $groupes = Auth::instance()->get_user()->parcour->getGroupesForPeriode($periode); ?>
                    <?php $groupes_id = Auth::instance()->get_user()->parcour->getGroupesForPeriodeAsIdArray($periode); ?>

                    <?php if ($periode->isEnlistmentOpen()): ?>

                        <?php foreach ($groupes as $groupe): ?>
                            <?php echo $groupe->module->name; ?>
                        <?php endforeach; ?>

                    <?php else: ?>
                        <div class="alert alert-info">
                            <p>
                                <strong><?php echo __('periode.enlistment.close.title'); ?></strong> <?php echo __('periode.enlistment.close.text'); ?>
                            </p>
                        </div>
                    <?php endif; ?>

                    <h4><?php echo __('periode.current.enlistement'); ?></h4>
                    <hr/>

                    <ul>
                        <?php foreach (Auth::instance()->get_user()->getGroupesFromGroupesIds($groupes_id) as $groupe) : ?>
                            <li><?php echo $groupe->module->name; ?></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </div>

        </div>
    <?php endforeach; ?>

</div>