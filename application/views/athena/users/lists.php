<div class="row">
    <div>
        <?php if (count($users) == 0) : ?>
            <div class="alert alert-info">
                <strong>Oupss!</strong> Aucun utilisateurs n'est présent dans ce groupe.
            </div>
        <?php endif; ?>


        <div class="panel-group" id="accordion">
            <?php foreach ($users as $user) : ?>


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion"
                               href="#collapse-<?php echo $user->id; ?>">
                                   <?php echo $user; ?>
                            </a>

                            <?php if ($user->isConfirmed) : ?>
                                <div class="label label-success pull-right">
                                    Confirmé
                                </div>
                            <?php else : ?>
                                <div class="label label-danger pull-right">
                                    En attente de confirmation
                                </div>
                            <?php endif; ?>
                        </h4>
                    </div>
                    <div id="collapse-<?php echo $user->id; ?>" class="panel-collapse collapse">
                        <div class="panel-body">
                            <dl class="dl-horizontal">
                                <dt>Nom</dt>
                                <dd><?php echo $user->name; ?></dd>
                                <dt>Prénom</dt>
                                <dd><?php echo $user->firstname; ?></dd>
                                <dt>Connexions</dt>
                                <dd><?php echo $user->logins; ?></dd>
                                <dt>Dernière connexion</dt>
                                <dd>
                                    <?php
                                    if ($user->logins > 0)
                                        echo date('d/m/Y H:i', $user->last_login);
                                    else
                                        echo 'Pas encore connecté';
                                    ?>
                                </dd>
                                <?php if ($user->parcour->id != null) : ?>
                                    <dt>Année suivie:</dt>
                                    <dd><?php echo $user->parcour->name; ?></dd>
                                <?php endif; ?>
                            </dl>
                        </div>
                        <div class="panel-footer">
                            <div class="btn-group btn-group-xs">
                                <span class="btn">Actions: </span>
                                <a href="<?php echo Route::get('users')->uri(array('action' => 'view', 'id' => $user->id)); ?>" class="btn btn-default btn-xs">Profil</a>
                                <a href="<?php echo Route::get('users')->uri(array('action' => 'update', 'id' => $user->id)); ?>" class="btn btn-default btn-xs" > Editer</a>
                                <a href="<?php echo Route::get('users')->uri(array('action' => 'delete', 'id' => $user->id)); ?>" class="btn btn-danger btn-xs user-confirm-action-delete">Supprimer</a>
                            </div>
                            <div class="btn-group btn-group-xs pull-right">
                                <?php if (!$user->isConfirmed) : ?>
                                    <a class="btn btn-success" href="<?php echo Route::get('users')->uri(array('action' => 'toggleactive', 'id' => $user->id)); ?>">Activer le compte</a>
                                <?php else: ?>
                                    <a class="btn btn-danger" href="<?php echo Route::get('users')->uri(array('action' => 'toggleactive', 'id' => $user->id)); ?>">Désactiver le compte</a>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>  

            <?php endforeach; ?>
        </div>

        <nav class="col-md-12 text-center">
            <?php echo $pagination; ?>
        </nav>
    </div>
</div>