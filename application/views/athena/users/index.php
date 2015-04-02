<div class="row">
    <article class="col-md-12">
        <div class="page-header">
            <h1>Utilisateurs <small>Les comptes utilisateurs</small></h1>
        </div>

        <?php foreach (Notices::get() as $notice): ?>
            <div class="alert alert-<?php echo $notice['type']; ?>">
                <p><?php echo $notice['key']; ?></p>
            </div>
        <?php endforeach; ?>


        <div class="well">
            <div>
                <a class="btn btn-primary" href="<?php echo Route::get('users')->uri(array('action' => 'add')); ?>">Ajouter un utilisateur</a>
            </div>
            
            <hr/>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Nom d'utilisateur</th>
                        <th>Rôles</th>
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
                                <?php foreach ($user->roles->find_all() as $controller) : ?>

                                    <div class="badge">
                                        <?php echo ucfirst($controller->name); ?>
                                    </div>
                                <?php endforeach; ?>

                            </td>
                            <td>
                                <div class="badge badge-notification">
                                    <?php echo $user->logins; ?>
                                </div>
                            </td>
                            <td>
                                <?php if ($user->logins > 0) echo date('d/m/Y H:i', $user->last_login);
                                else echo 'Pas encore connecté'; ?>
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
