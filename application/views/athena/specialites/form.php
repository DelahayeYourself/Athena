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
                    
                    <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $specialite->name; ?>">
                </div>
                
                <div class="form-group">
                    <label for='mention_id' class="control-label">Mention</label>
                    <?php echo Form::select('mention_id', $mentions, $specialite->mention_id, array('class' => 'form-control', 'id' => 'mention_id')); ?>
                </div>

            </form>
        </div>
    </article>
</div>