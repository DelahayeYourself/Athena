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
        'max_length' => 'Nom non-compris en :param2 et :param3 caractères.',
        'min_length' => 'Nom non-compris en :param2 et :param3 caractères.',
    ),
    
    'date_begin' => array(
        'not_empty' => 'Date de début de période non renseigné.',
    ),
    
    'date_end' => array(
        'not_empty' => 'Date de fin de période non renseigné.',
        'Model_Periode::IsSuperiorToBegin' => 'Date de fin de période antérieur à la date de début.'
    ),
    
    'date_begin_choise' => array(
        'not_empty' => 'Date de début d\'inscription non renseigné.',
    ),
    
    'date_end_choise' => array(
        'not_empty' => 'Date de fin d\'inscription non renseigné.',
        'Model_Periode::IsSuperiorToBeginChoise' => 'Date de fin d\'inscription antérieur à celle de début.',
    ),
);