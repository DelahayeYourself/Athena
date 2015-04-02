<div class="row">
    <article class="col-md-12">

        <div class="page-header">
            <h1>
                <?php if ($module->id != null) : ?>
                    Mettre à jour le module &laquo; <?php echo $module->name; ?> &raquo;
                <?php else : ?>
                    Ajouter un nouveau module
                <?php endif; ?>
            </h1>
        </div>

        <div class="well">
            <form method="POST" class="form">
                <div class="form-group">
                    <button type="submit" class="btn btn-success" value="save" name="update">Sauvegarder</button>
                </div>

                <hr class="divider">

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'name') ?>">
                    <label for="name" class="control-label">Nom</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'name') ?>

                    <?php echo Form::input('name', $module->name, array('id' => 'name', 'placeholder' => 'Nom', 'class' => 'form-control')); ?>
                </div>

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'desc') ?>">
                    <label for="desc" class="control-label">Description</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'desc') ?>
                    <?php echo Form::textarea('desc', $module->desc, array('id' => 'desc', 'placeholder' => 'Description', 'class' => 'form-control markdown-editor')); ?>
                </div>

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'periode_id') ?>">
                    <label for="periode_id" class="control-label">Période d'enseignement du module</label>

                    <?php echo Athena_Form::renderErrorMessage($errors, 'periode_id') ?>
                    <?php echo Form::select('periode_id', $periodes, $module->periode_id, array('class' => 'form-control', 'id' => 'periode_id')); ?>
                </div>
            </form>
        </div>
    </article>
</div>