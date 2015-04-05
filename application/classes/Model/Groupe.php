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
        return (0 < strlen($this->str_groupes)) ? Athena_String::format('[0] ([1])', $this->module->name, $this->str_groupes) : $this->module->name;
    }

    /**
     * toStringParcours
     * 
     * Method that returns the groupes listings as a string
     * 
     * @return String
     */
    public function toStringParcours() {
        return implode(', ', $this->parcours->find_all()->as_array());
    }

    /**
     * setParcours
     * 
     * Handle correctly the set of multiple parcour
     * 
     * @param array $parcours
     */
    public function setParcours($parcours) {
        $this->removeParcours();
        if (!empty($parcours)) {
            foreach ($parcours as $parcour_id) {
                $this->add('parcours', ORM::factory('Parcour', $parcour_id));
            }
        }
    }

    /**
     * removeParcours
     * 
     * Remove all parcours binded to the model
     * 
     */
    public function removeParcours() {
        foreach ($this->parcours->find_all() as $parcour) {
            $this->remove('parcours', $parcour);
        }
    }

    /**
     * remove
     * 
     * Override remove method for some behaviour,
     * Aka refresh the str_groupes attributes
     * 
     * @param String $alias
     * @param String $far_keys
     */
    public function remove($alias, $far_keys = NULL) {
        parent::remove($alias, $far_keys);
        $this->str_groupes = $this->toStringParcours();
    }
    
    /**
     * add
     * 
     * Override add method for some behaviour,
     * Aka refresh the str_groupes attributes
     * 
     * @param String $alias
     * @param String $far_keys
     */
    public function add($alias, $far_keys) {
        parent::add($alias, $far_keys);
        $this->str_groupes = $this->toStringParcours();
    }
    
    /**
     * save
     * 
     * Override for some behaviour like refresh of the str_groupes
     * 
     * @param \Validation $validation
     */
    public function save(\Validation $validation = NULL) {
        parent::save($validation);
        $this->str_groupes = $this->toStringParcours();
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
                array('range', array(':value', 1, 255)),
            ),
            'mandatory' => array(
                array('digit'),
            ),
        );
    }

}
