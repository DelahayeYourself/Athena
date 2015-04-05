<div class="row">

    <div>
        <div>
            <a class="btn btn-primary" href="<?php echo Route::get('periodes')->uri(array('action' => 'form')); ?>">Ajouter une période</a>
        </div>

        <hr/>

        <div class="panel-group" id="accordion">
            <?php foreach ($periodes as $periode) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse-<?php echo $periode->id; ?>">
                                <?php echo $periode->name; ?> (<?php echo $periode->date_begin; ?> - <?php echo $periode->date_end; ?>)
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-<?php echo $periode->id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <dl class="dl-horizontal">
                                <dt>Date de début</dt>
                                <dd><?php echo $periode->date_begin; ?></dd>
                                <dt>Date de fin</dt>
                                <dd><?php echo $periode->date_end; ?></dd>
                                <dt>Plage d'inscriptions</dt>
                                <dd><?php echo $periode->date_begin_choise; ?> - <?php echo $periode->date_end_choise; ?></dd>
                            </dl>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-xs">
                                <span class="btn">Actions: </span>
                                <a href="<?php echo Route::get('periodes')->uri(array('action' => 'form', 'id' => $periode->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
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