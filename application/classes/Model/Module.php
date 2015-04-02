<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_Module
 * 
 * @extends ORM
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_Module extends ORM {

    /**
     * Belongs to entity for Model_Module
     * 
     * @var array
     */
    protected $_belongs_to = array(
        'periode' => array('model' => 'Periode', 'foreign_key' => 'periode_id'),
    );

    /**
     * Which entities should be loaded with an instance of Model_Module
     * 
     * @var array
     */
    protected $_load_with = array('periode');

    /**
     * rules
     * 
     * return array rules for this model
     * 
     * @return array
     */
    public function rules() {
        return array(
            'name' => array(
                array('not_empty'),
                array('min_length', array(':value', '3')),
                array('max_length', array(':value', '250')),
            ),
        );
    }

}
