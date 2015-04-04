<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_Groupe
 * 
 * @extends ORM
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_Groupe extends ORM {

    /**
     * A string that contains the groupes listing
     * 
     * @var String 
     */
    public $str_groupes;
    
    /**
     * Belongs to entity for Model_Groupe
     * 
     * @var array
     */
    protected $_belongs_to = array(
        'module' => array('model' => 'Module', 'foreign_key' => 'module_id'),
    );

    /**
     * Has Many entity for Model_Groupe
     * 
     * @var array 
     */
    protected $_has_many = array(
        'parcours' => array('model' => 'Parcour', 'through' => 'groupes_parcours'),
    );

    /**
     * Which entities should be loaded with an instance of Model_Groupe
     * 
     * @var array
     */
    protected $_load_with = array('module');

    /**
     * __construct
     * 
     * Override constructor for handling some behaviour
     * 
     * @param Model_Groupe $id
     */
    public function __construct($id = NULL) {
        parent::__construct($id); 
        $this->str_groupes = $this->toStringParcours();
    }
    
    /**
     * Override __toString method,
     * For userfriendly output
     * 
     * @return String
     */
    public function __toString() {
        return Athena_String::format('[0] ([1])', $this->module->name, $this->str_groupes);
    }
    
    /**
     * toStringParcours
     * 
     * Method that returns the groupes listings as a string
     * 
     * @return String
     */
    public function toStringParcours(){
        return implode(', ', $this->parcours->find_all()->as_array());
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
            'capacity' => array(
                array('digit'),
            ),
            'mandatory' => array(
                array('digit'),
            ),
        );
    }

}
