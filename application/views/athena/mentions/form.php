<div class="row">
    <article class="col-md-12">

        <div class="page-header">
            <h1>
                <?php if ($mention->id != null) : ?>
                    Mettre à jour la mention &laquo; <?php echo $mention->name; ?> &raquo;
                <?php else : ?>
                    Ajouter une nouvelle mention
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
                    
                    <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $mention->name; ?>">
                </div>
                    </form>
                </div>
                </article>
        </div>