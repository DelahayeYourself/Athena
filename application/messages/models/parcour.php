<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * @var array Message for rules validation in fr
 */
return array
    (
    'name' => array
        (
        'not_empty' => 'Nom non renseigné.',
        'max_length' => 'Nom non-compris entre 3 et 50 caractères.',
        'min_length' => 'Nom non-compris entre 3 et 50 caractères.',
    ),
    'year' => array
        (
        'not_empty' => 'Année non renseigné.',
        'max_length' => 'Année non-comprise entre 1 et 5 caractères.',
        'min_length' => 'nnée non-comprise entre 1 et 5 caractères.',
    ),
);
?>