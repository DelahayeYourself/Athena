<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_Specialite
 * 
 * @extends ORM
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_Specialite extends ORM {

    protected $_belongs_to = array(
        'mention' => array('model' => 'Mention', 'foreign_key' => 'mention_id'),
    );

    /**
     * Which entities should be loaded with an instance of Model_Specialite
     * 
     * @var array
     */
    protected $_load_with = array('mention');

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
                array('max_length', array(':value', '50')),
            ),
        );
    }

}
