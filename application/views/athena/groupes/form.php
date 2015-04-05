<div class="row">
    <article class="col-md-12">


        <div class="well">
            <form method="POST" class="form">
                <div class="form-group">
                    <button type="submit" class="btn btn-success" value="save" name="update">Sauvegarder</button>
                </div>

                <hr class="divider">

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'capacity') ?>">
                    <label for="capacity" class="control-label">Capacité</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'capacity') ?>

                    <?php echo Form::input('capacity', $groupe->capacity, array('class' => 'form-control', 'id' => 'capacity', 'Placeholder' => 'Capacité', 'type' => 'text')); ?>
                </div>
                
                <div class="form-group" <?php echo Athena_Form::hasError($errors, 'module_id') ?>>
                    <label for="module_id" class="control-label">Module</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'module_id') ?>
                    <?php echo Form::select('module_id', $modules, $groupe->module, array('id' => 'module_id', 'class' => 'form-control')); ?>
                </div>
                
                <div class="form-group" <?php echo Athena_Form::hasError($errors, 'parcours[]') ?>>
                    <label for="parcours" class="control-label">Parcours concernés</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'parcours[]') ?>
                    <?php echo Form::select('parcours[]', $parcours, $opts_parcours, array('id' => 'parcours', 'class' => 'form-control select2')); ?>
                </div>
                
                <div class="form-group" <?php echo Athena_Form::hasError($errors, 'mandatory') ?>>
                    <label for="mandatory" class="control-label">Groupe obligatoire pour les parcours concernés</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'mandatory') ?>
                    <?php echo Form::select('mandatory', $options_mandatory, $groupe->mandatory, array('id' => 'mandatory', 'class' => 'form-control')); ?>
                </div>

            </form>
        </div>
    </article>
</div>