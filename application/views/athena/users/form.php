<div class="row">
    <article class="col-md-12">


        <div class="well">
            <form method="POST" class="form">
                <div class="form-group">
                    <button type="submit" class="btn btn-success" value="save" name="updateProfil">Sauvegarder</button>
                </div>

                <hr class="divider">

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'firstname') ?>">
                    <label for="firstname" class="control-label">Prénom</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'firstname'); ?>
                    <input id="firstname" type="text" name="firstname" placeholder="Prénom" class="form-control" value="<?php echo $user->firstname; ?>">
                </div>
                <div class="form-group <?php echo Athena_Form::hasError($errors, 'name') ?>">
                    <label for="name" class="control-label">Nom</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'name') ?>
                    <input id="name" type="text" name="name" placeholder="Nom" class="form-control" value="<?php echo $user->name; ?>">
                </div>
                <div class="form-group <?php echo Athena_Form::hasError($errors, 'email') ?>">
                    <label for="email" class="control-label">E-mail</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'email') ?>
                    <input id="email" type="text" name="email" placeholder="E-mail" class="form-control" value="<?php echo $user->email; ?>">
                </div>
                <div class="form-group <?php echo Athena_Form::hasError($errors, 'username') ?>">
                    <label for="username" class="control-label">Nom d'utilisateur</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'username') ?>
                    <input id="username" type="text" name="username" placeholder="Nom d'utilisateur" class="form-control" value="<?php echo $user->username; ?>">

                </div>
                <?php if ($user->id == null) : ?>
                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'password') ?>">
                        <label for="password" class="control-label">Mot de passe</label>
                        <?php echo Athena_Form::renderErrorMessage($errors, 'password') ?>
                        <input id="password" type="password" name="password" placeholder="Mot de passe" class="form-control" value="">
                    </div>
                <?php endif; ?>

                <div class="form-group <?php echo Athena_Form::hasError($errors, 'account_type') ?>">
                    <label for="account_type" class="control-label">Type de compte</label>
                    <?php echo Athena_Form::renderErrorMessage($errors, 'account_type') ?>
                    <?php echo Form::select('account_type', $account_types, $account_type, array('class' => 'form-control', 'id' => 'account_type')); ?>
                </div>

                <?php if ($account_type == 0) : ?>
                    <div class="form-group <?php echo Athena_Form::hasError($errors, 'parcour_id'); ?>">
                        <label for="parcour_id" class="control-label">Année suivie</label>
                        <?php echo Athena_Form::renderErrorMessage($errors, 'parcour_id'); ?>
                        <?php echo Form::select('parcour_id', $parcours, $user->parcour_id, array('id' => 'parcour_id', 'class' => 'form-control')); ?>
                    </div>
                <?php endif; ?>

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