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
                    
                    <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $parcour->name; ?>">
                </div>
                
                <div class="form-group <?php echo Athena_Form::hasError($errors, 'year') ?>">
                    <label for="year" class="control-label">Année</label>
                    
                    <?php echo Athena_Form::renderErrorMessage($errors, 'year') ?>
                    
                    <?php echo Form::input('year', $parcour->year, array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'Année', 'id' => 'year')); ?>
                </div>
                
                <div class="form-group">
                    <label for="specialite_id" class="control-label">Spécialité</label>
                    <?php echo Form::select('specialite_id', $specialites, $parcour->specialite_id, array('class' => 'form-control', 'id' => 'specialite_id')); ?>
                </div>
                
            </form>
        </div>
    </article>
</div>