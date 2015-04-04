<div class="row">

    <?php foreach (Notices::get() as $notice): ?>
        <div class="alert alert-<?php echo $notice['type']; ?>">
            <p><?php echo $notice['key']; ?></p>
        </div>
    <?php endforeach; ?>

    <div class="well">
        <div>
            <a class="btn btn-primary" href="<?php echo Route::get('parcours')->uri(array('action' => 'form')); ?>">Ajouter un parcours</a>
        </div>

        <hr/>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Année</th>
                    <th>Spécialité/Mention</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parcours as $parcour) : ?>
                    <tr>
                        <td><?php echo $parcour->id; ?></td>
                        <td><?php echo $parcour->name; ?></td>
                        <td><?php echo $parcour->year; ?></td>
                        <td>
                            <?php echo $parcour->specialite->name; ?> / <?php echo $parcour->specialite->mention->name; ?>
                        </td>
                        <td>

                            <a href="<?php echo Route::get('parcours')->uri(array('action' => 'form', 'id' => $parcour->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
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