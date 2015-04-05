<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * @var array Message for rules validation in fr
 */
return array
    (
    'username' => array
        (
        'not_empty' => 'Nom d\'utilisateur non renseigné.',
        'max_length' => 'Nom d\'utilisateur non-compris entre :param2 et :param3 caractères.',
        'min_length' => 'Nom d\'utilisateur non-compris entre :param2 et :param3 caractères.',
        'Model_User::isUsernameAvailable' => 'Nom d\'utilisateur déjà utilisé par un autre compte',
    ),
    'name' => array
        (
        'not_empty' => 'Nom non renseigné.',
        'max_length' => 'Nom non-compris entre :param2 et :param3 caractères.',
        'min_length' => 'Nom non-compris entre :param2 et :param3 caractères.',
    ),
    'firstname' => array
        (
        'not_empty' => 'Prénom non renseigné.',
        'max_length' => 'Prénom non-compris entre :param2 et :param3 caractères.',
        'min_length' => 'Prénom non-compris entre :param2 et :param3 caractères.',
    ),
    'email' => array
        (
        'not_empty' => 'E-mail non renseigné.',
        'email' => 'E-mail non valide.',
        'Model_User::isMailAvailable' => 'E-mail déjà utilisé par un autre compte.'
    ),
    'newPassword' => array
        (
        'not_empty' => 'Nouveau mot de passe non renseigné.',
        'max_length' => 'Nouveau mot de passe non-compris entre :param2 et :param3 caractères.',
        'min_length' => 'Nouveau mot de passe non-compris entre :param2 et :param3 caractères.',
    ),
    'password' => array
        (
        'not_empty' => 'Mot de passe non renseigné.',
        'max_length' => 'Mot de passe non-compris entre :param2 et :param3 caractères.',
        'min_length' => 'Mot de passe non-compris entre :param2 et :param3 caractères.',
        'not' => 'Le mot de passe renseigné ne correspond pas à votre mot de passe actuel.',
    ),
    'confirmation' => array
        (
        'matches' => 'La confirmation et le nouveau mot de passe ne correspondent pas.',
    ),
);