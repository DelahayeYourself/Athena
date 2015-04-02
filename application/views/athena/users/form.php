<div class="row">
    <article class="col-md-12">

        <div class="page-header">
            <h1>
                <?php if ($user->id != null) : ?>
                    Mettre à jour le profil de <?php echo $user->firstname; ?> <?php echo $user->name; ?>
                <?php else : ?>
                    Ajouter un nouvel utilisateur
                <?php endif; ?>
            </h1>
        </div>


        <div class="well">
            <form method="POST" class="form">
                <div class="form-group">
                    <button type="submit" class="btn btn-success" value="save" name="updateProfil">Sauvegarder</button>
                </div>

                <hr class="divider">

                <div>

                    <?php if (isset($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <div class="alert alert-warning">
                                <p><?php echo $error; ?></p>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>


                </div>

                <div class="form-group">
                    <label for="firstname">Prénom</label>
                    <input id="firstname" type="text" name="firstname" placeholder="Prénom" class="form-control" value="<?php echo $user->firstname; ?>">
                </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $user->name; ?>">
                </div>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input id="email" type="text" name="email" placeholder="E-mail" class="form-control" value="<?php echo $user->email; ?>">
                </div>
                <div class="form-group">
                    <label for="username">Nom d'utilisateur</label>
                    <input id="username" type="text" name="username" placeholder="Nom d'utilisateur" class="form-control" value="<?php echo $user->username; ?>">

                </div>
                <?php if ($user->id == null) : ?>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" class="form-control" value="">
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="roles">Rôle(s)</label>
                    <?php
                    foreach ($roles as $i => $controller) {
                        $roles[$i] = __($controller);
                    }

                    $arrayRoles = array();
                    foreach ($rolesUser as $i => $controller) {
                        $arrayRoles[$i] = $controller;
                    }

                    echo Form::select('user_roles[]', $roles, $arrayRoles, array('id' => 'inputPermissions', 'placeholder' => __('User roles'), 'class' => 'form-control'));
                    ?>
                </div>

            </form>

        </div>
        <?php if ($user->id != null): ?>
            <div class="page-header">
                <h1>Mettre à jour le mot de passe de <?php echo $user->firstname . ' ' . $user->name; ?></h1>
            </div>
            <div class = "well">    
                <form method="POST" class="form">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success" value="save" name="updatePassword">Sauvegarder le nouveau mot de passe</button>
                    </div>

                    <hr class="uk-article-divider">

                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" class="form-control" value="">
                    </div>

                </form>

            </div>

        <?php endif; ?>
    </article>
</div>