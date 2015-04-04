<div class="row">
    <article class="col-md-12">

        <div class="well">
            <?php if (count($users) == 0) : ?>
                <div class="alert alert-info">
                    <strong>Oupss!</strong> Aucun utilisateurs n'est présent dans ce groupe.
                </div>
            <?php endif; ?>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom d'utilisateur</th>
                        <th>État du compte</th>
                        <th>Connexions</th>
                        <th>Dernière connexion</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->name; ?></td>
                            <td><?php echo $user->firstname; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td>
                                <?php if ($user->isConfirmed) : ?>
                                    <div class="label label-success">
                                        Confirmé
                                    </div>
                                <?php else : ?>
                                    <div class="label label-danger">
                                        En attente de confirmation
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="badge badge-notification">
                                    <?php echo $user->logins; ?>
                                </div>
                            </td>
                            <td>
                                <?php
                                if ($user->logins > 0)
                                    echo date('d/m/Y H:i', $user->last_login);
                                else
                                    echo 'Pas encore connecté';
                                ?>
                            </td>
                            <td>
                                <a href="<?php echo Route::get('users')->uri(array('action' => 'view', 'id' => $user->id)); ?>" class="btn btn-default btn-xs">Profil</a>
                                <a href="<?php echo Route::get('users')->uri(array('action' => 'update', 'id' => $user->id)); ?>"class="btn btn-default btn-xs" > Editer</a>
                                <a href="<?php echo Route::get('users')->uri(array('action' => 'delete', 'id' => $user->id)); ?>" class="btn btn-danger btn-xs user-confirm-action-delete">Supprimer</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </article>


    <nav class="col-md-12 text-center">
        <?php echo $pagination; ?>
    </nav>
</div>