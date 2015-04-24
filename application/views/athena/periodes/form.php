<div class="row">
    <article class="col-md-12">


        <div class="well">
            <form method="POST" class="form">
                <div class="form-group">
                    <button type="submit" class="btn btn-success" value="save" name="update">Sauvegarder</button>
                </div>

                <hr class="divider">

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'name') ?>">
                    <label for="name" class="control-label">Nom</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'name') ?>
                    <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $periode->name; ?>">
                </div>

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'parcours'); ?>">
                    <label for="parcours" class="control-label">Parcours liés à cette période</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'parcours'); ?>
                    <?php echo Form::select('parcours[]', $parcours, $periode->parcours->find_all()->as_array('id', 'id'), array('id' => 'parcours', 'class' => 'form-control')); ?>
                </div>

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'number_choise'); ?>">
                    <label for="number_choise" class="control-label">Nombre de modules optionnelles à choisir</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'number_choise'); ?>
                    <?php echo Form::input('number_choise', $periode->number_choise, array('id' => 'number_choise', 'Placeholder' => 'Nombre de choix', 'class' => 'form-control', 'type' => 'number')); ?>
                </div>

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'date_begin') ?>">
                    <label for="date_begin" class="control-label">Date de début de période</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'date_begin') ?>
                    <div class='input-group date datetimepicker'>
                        <input id="date_begin" type="text" name="date_begin" placeholder="Date de début de période" class="form-control" value="<?php echo $periode->date_begin; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div> 

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'date_end') ?>">
                    <label for="date_end" class="control-label">Date de fin de période</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'date_end') ?>
                    <div class='input-group date datetimepicker'>
                        <input id="date_end" type="text" name="date_end" placeholder="Date de fin de période" class="form-control" value="<?php echo $periode->date_end; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div> 

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'date_begin_choise') ?>">
                    <label for="date_begin_choise" class="control-label">Date d'ouverture des inscriptions</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'date_begin_choise') ?>
                    <div class='input-group date datetimepicker'>
                        <input id="date_begin_choise" type="text" name="date_begin_choise" placeholder="Date d'ouverture des inscriptions" class="form-control" value="<?php echo $periode->date_begin_choise; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div> 

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'date_end_choise') ?>">
                    <label for="date_end_choise" class="control-label">Date de fermeture des inscriptions</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'date_end_choise') ?>
                    <div class='input-group date datetimepicker'>
                        <input id="date_end_choise" type="text" name="date_end_choise" placeholder="Date de fermeture des inscriptions" class="form-control" value="<?php echo $periode->date_end_choise; ?>">
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div> 

            </form>
        </div>
    </article>
</div>