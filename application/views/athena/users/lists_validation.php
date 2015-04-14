<div class="row">
    <div>
        <?php if (count($users) == 0) : ?>
            <div class="alert alert-info">
                <strong>Yeah!</strong> Aucun utilisateurs en attente de confirmation.
            </div>
        <?php endif; ?>
    </div>

    <?php if (count($users) > 0) : ?>
        <?php echo Form::open(); ?>
        <table id="table-check" class="table table-bordred table-striped">

            <thead>

            <th><input type="checkbox" id="checkall" /></th>
            <th>Prénom</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Année suivi</th>
            <th>Option</th>

            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><input type="checkbox" class="checkthis" value="<?php echo $user->id; ?>" name="users_id[<?php echo $user->id; ?>]" /></td>
                        <td><?php echo $user->firstname; ?></td>
                        <td><?php echo $user->name; ?></td>
                        <td><?php echo $user->email; ?></td>
                        <td><?php echo $user->parcour; ?></td>
                        <td>
                            <a class="btn btn-success btn-xs" href="<?php echo Route::get('users')->uri(array('action' => 'toggleactive', 'id' => $user->id)); ?>">Activer le compte</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-group">
            <button type="submit" class="btn btn-success btn-xs" value="update" name="update">Activer les comptes</button>
            <button type="submit" class="btn btn-danger btn-xs user-confirm-action-delete" value="remove" name="remove">Supprimer les comptes</button>
        </div>

        <?php echo Form::close(); ?>


        <nav class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </nav>
    <?php endif; ?>

</div>