<div class="row">
    <article class="col-md-12">
        <div class="page-header">
            <h1>Module</h1>       
        </div>

        <?php foreach (Notices::get() as $notice): ?>
            <div class="alert alert-<?php echo $notice['type']; ?>">
                <p><?php echo $notice['key']; ?></p>
            </div>
        <?php endforeach; ?>

        <div class="well">
            <div>
                <a class="btn btn-primary" href="<?php echo Route::get('modules')->uri(array('action' => 'form')); ?>">Ajouter un modules</a>
            </div>

            <hr/>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Période</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($modules as $module) : ?>
                        <tr>
                            <td><?php echo $module->id; ?></td>
                            <td><?php echo $module->name; ?></td>
                            <td><?php echo $module->parsed_desc; ?></td>
                            <td><?php echo $module->periode->name; ?></td>
                            <td>

                                <a href="<?php echo Route::get('modules')->uri(array('action' => 'form', 'id' => $module->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
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