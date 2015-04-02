<div class="row">
    <article class="col-md-12">
        <div class="page-header">
            <h1>Périodes</h1>       
        </div>

        <?php echo View::factory('athena/general/notices'); ?>

        <div class="well">
            <div>
                <a class="btn btn-primary" href="<?php echo Route::get('periodes')->uri(array('action' => 'form')); ?>">Ajouter une période</a>
            </div>

            <hr/>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Date de début</th>
                        <th>Date de fin</th>
                        <th>Date d'ouverture des inscriptions</th>
                        <th>Date de fermeture des inscriptions</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($periodes as $periode) : ?>
                        <tr>
                            <td><?php echo $periode->id; ?></td>
                            <td><?php echo $periode->name; ?></td>
                            <td><?php echo $periode->date_begin; ?></td>
                            <td><?php echo $periode->date_end; ?></td>
                            <td><?php echo $periode->date_begin_choise; ?></td>
                            <td><?php echo $periode->date_end_choise; ?></td>
                            <td>

                                <a href="<?php echo Route::get('periodes')->uri(array('action' => 'form', 'id' => $periode->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
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