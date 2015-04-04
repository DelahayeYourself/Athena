<div class="row">

    <div>
        <div>
            <a class="btn btn-primary" href="<?php echo Route::get('groupes')->uri(array('action' => 'form')); ?>">Ajouter un groupe</a>
        </div>

        <hr/>

        <div class="panel-group" id="accordion">
            <?php foreach ($groupes as $groupe) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse-<?php echo $groupe->id; ?>">
                                   <?php echo $groupe; ?>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-<?php echo $groupe->id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <dl class="dl-horizontal">
                                <dt>Module</dt>
                                <dd><?php echo $groupe->module; ?></dd>
                                <dt>Capacité</dt>
                                <dd><?php echo $groupe->capacity; ?></dd>
                                <dt>Groupes</dt>
                                <dd><?php echo $groupe->str_groupes; ?></dd>
                                <dt>Obligatoire</dt>
                                <dd>
                                    <?php echo ($groupe->mandatory == 1) ? 'Oui' : 'Non'; ?>
                                </dd>
                            </dl>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-xs">
                                <span class="btn">Actions: </span>
                                <a href="<?php echo Route::get('groupes')->uri(array('action' => 'form', 'id' => $groupe->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
                            </div>
                            <div class="btn-group btn-group-xs pull-right">
                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <nav class="col-md-12 text-center">
        <?php echo $pagination->render(); ?>
    </nav>
</div>