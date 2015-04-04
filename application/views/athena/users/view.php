<div class="row">
    <article class="col-md-12">

        <div class="well">

            <div>

                <div class="btn-group">

                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Options
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="<?php echo Route::get('users')->uri(); ?>">Liste des utilisateurs</a></li>
                            <li><a href="<?php echo Route::get('users')->uri(array('action' => 'add')); ?>"> Ajouter un utilisateur</a></li>
                            <li><a href="<?php echo Route::get('users')->uri(array('action' => 'update', 'id' => $user->id)); ?>">Editer l'utilisateur</a></li>
                            <li><a href="<?php echo Route::get('users')->uri(array('action' => 'delete', 'id' => $user->id)); ?>" class="user-confirm-action-delete">Supprimer l'utilisateur</a></li>
                        </ul>
                    </div>



            </div>

            <h2>
                Détails du profil utilisateur
            </h2>

            <dl class="dl-horizontal">
                <dt>#</dt> <dd><?php echo $user->id; ?></dd>
                <dt>Prénom</dt> <dd><?php echo $user->firstname; ?></dd>
                <dt>Nom</dt> <dd><?php echo $user->name; ?></dd>
                <dt>Nom d'utilisateur</dt> <dd><?php echo $user->username; ?></dd>
                <dt>Rôles</dt> 
                <dd>
                    <?php foreach ($user->roles->find_all() as $controller) : ?>

                        <div class="badge">
                            <?php echo ucfirst($controller->name); ?>
                        </div>
                    <?php endforeach; ?>
                </dd>
                <dt>Connexions</dt> <dd><?php echo $user->logins; ?></dd>
                <dt>Dernière connexion</dt> <dd><?php
                    if ($user->logins > 0)
                        echo date('d/m/Y H:i', $user->last_login);
                    else
                        echo 'Pas encore connecté'
                        ?></dd>	
            </dl>

            
        </div>
    </article>
</div>