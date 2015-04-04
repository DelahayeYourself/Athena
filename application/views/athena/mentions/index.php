<div class="row">

    <div class="well">
        <div>
            <a class="btn btn-primary" href="<?php echo Route::get('mentions')->uri(array('action' => 'form')); ?>">Ajouter une mention</a>
        </div>

        <hr/>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mentions as $mention) : ?>
                    <tr>
                        <td><?php echo $mention->id; ?></td>
                        <td><?php echo $mention->name; ?></td>
                        <td>

                            <a href="<?php echo Route::get('mentions')->uri(array('action' => 'form', 'id' => $mention->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

    <nav class="col-md-12 text-center">
        <?php echo $pagination->render(); ?>
    </nav>
</div>