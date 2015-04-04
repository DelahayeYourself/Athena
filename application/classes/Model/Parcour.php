<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_Parcour
 * 
 * @extends ORM
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_Parcour extends ORM {

    /**
     * Belongs to entity for Model_Parcour
     * 
     * @var array
     */
    protected $_belongs_to = array(
        'specialite' => array('model' => 'Specialite', 'foreign_key' => 'specialite_id'),
    );

    /**
     * Which entities should be loaded with an instance of Model_Parcour
     * 
     * @var array
     */
    protected $_load_with = array('specialite');

    /**
     * Override __toString method,
     * For userfriendly output
     * 
     * @return String
     */
    public function __toString() {
        return $this->name;
    }
    
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
            'year' => array(
                array('not_empty'),
                array('min_length', array(':value', '1')),
                array('max_length', array(':value', '50')),
            ),
        );
    }

}
