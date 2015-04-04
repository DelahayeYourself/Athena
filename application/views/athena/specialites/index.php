<div class="row">
    <article class="col-md-12">

        <div class="well">
            <div>
                <a class="btn btn-primary" href="<?php echo Route::get('specialites')->uri(array('action' => 'form')); ?>">Ajouter une spécialité</a>
            </div>

            <hr/>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Mention</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($specialites as $specialite) : ?>
                        <tr>
                            <td><?php echo $specialite->id; ?></td>
                            <td><?php echo $specialite->name; ?></td>
                            <td><?php echo $specialite->mention->name; ?></td>
                            <td>

                                <a href="<?php echo Route::get('specialites')->uri(array('action' => 'form', 'id' => $specialite->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </article>

    <nav class="col-md-12 text-center">
        <?php echo $pagination->render(); ?>
    </nav>
</div>