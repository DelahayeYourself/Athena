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
     * Has many entities for Model_Parcour
     * 
     * @var array 
     */
    protected $_has_many = array(
        'groupes' => array('model' => 'Groupe', 'through' => 'groupes_parcours'),
        'periodes' => array('model' => 'Periode', 'through' => 'parcours_periodes'),
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
     * getGroupesForPeriode
     * 
     * Method to return groupes bind to this parcour model and the given periode
     * 
     * @param Model_Periode $periode
     * @return type
     */
    public function getGroupesForPeriode($periode) {
        $arr_modules_ids = $periode->modules->find_all()->as_array('id', 'id');
        if (!empty($arr_modules_ids)) {
            return $this->groupes->where('module_id', 'IN', $arr_modules_ids)->find_all();
        } else {
            return array();
        }
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
