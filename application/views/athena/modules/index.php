<div class="row">

    <div>
        <div>
            <a class="btn btn-primary" href="<?php echo Route::get('modules')->uri(array('action' => 'form')); ?>">Ajouter un modules</a>
        </div>

        <hr/>

        <div class="panel-group" id="accordion">
            <?php foreach ($modules as $module) : ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse-<?php echo $module->id; ?>">
                                <?php echo $module->name; ?> (<?php echo $module->periode->name; ?>)
                            </a>
                        </h4>
                    </div>
                    <div id="collapse-<?php echo $module->id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <?php echo $module->parsed_desc; ?>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-xs">
                                <span class="btn">Actions: </span>
                                <a href="<?php echo Route::get('modules')->uri(array('action' => 'form', 'id' => $module->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
                            </div>
                            <div class="btn-group btn-group-xs pull-right">
                                <!--<a class="btn btn-primary" href="#">Report this question</a>-->
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <nav class="col-md-12 text-center">
        <?php echo $pagination->render(); ?>
    </nav>
</div>