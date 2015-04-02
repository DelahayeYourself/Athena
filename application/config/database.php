<?php

defined('SYSPATH') OR die('No direct access allowed.');

return array
    (
    'default' => array
        (
        'type' => 'MySQLi',
        'connection' => array(
            'hostname' => 'localhost',
            'database' => 'athena.local',
            'username' => 'root',
            'password' => '',
            'persistent' => FALSE,
        ),
        'table_prefix' => '',
        'charset' => 'utf8',
        'caching' => FALSE,
    ),
);
