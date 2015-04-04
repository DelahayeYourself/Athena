<div class="row">

    <div class="well">
        <form method="POST" class="form">
            <div class="form-group">
                <button type="submit" class="btn btn-success" value="save" name="update">Sauvegarder</button>
            </div>

            <hr class="divider">

            <div class="form-group <?php echo Athena_Form::hasError($errors, 'name') ?>">
                <label for="name" class="control-label">Nom</label>

                <?php echo Athena_Form::renderErrorMessage($errors, 'name') ?>

                <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $mention->name; ?>">
            </div>
        </form>
    </div>
</div>