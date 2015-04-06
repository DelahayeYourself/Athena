<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_Periode
 * 
 * @extends ORM
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_Periode extends ORM {

    /**
     * Used to check if all validation have to be used or only some 
     * Please use it with caution
     * Only used for overriding default behavior for save method inherit from ORM class
     * 
     * @var boolean
     */
    protected $_validation_required = TRUE;

    /**
     * rules
     * 
     * return array rules for this model
     * 
     * @return array
     */
    public function rules() {
        if ($this->validation_required()) {
            return array(
                'name' => array(
                    array('not_empty'),
                    array('min_length', array(':value', '3')),
                    array('max_length', array(':value', '50')),
                ),
                'date_begin' => array(
                    array('not_empty'),
                    array('Athena_Date::isValid', array(':value')),
                ),
                'date_end' => array(
                    array('not_empty'),
                    array('Athena_Date::isValid', array(':value')),
                    array('Model_Periode::IsSuperiorToBegin', array(':value', ':model')),
                ),
                'date_begin_choise' => array(
                    array('not_empty'),
                    array('Athena_Date::isValid', array(':value')),
                ),
                'date_end_choise' => array(
                    array('not_empty'),
                    array('Athena_Date::isValid', array(':value')),
                    array('Model_Periode::IsSuperiorToBeginChoise', array(':value', ':model')),
                ),
                'number_choise' => array(
                    array('digit'),
                    array('range', array(':value', 1, 255)),
                ),
            );
        } else {
            return array();
        }
    }

    /**
     * Simple getter for validation required
     * Maybe not so useful
     * 
     * @return boolean
     */
    public function validation_required() {
        return $this->_validation_required;
    }

    /**
     * Validation method to check if the end date is superior to the begin date
     * 
     * @param String $date
     * @param Model_Periode $model
     * @return boolean
     */
    public static function IsSuperiorToBegin($date, $model) {
        if ($date == null || $model->date_begin == null) {
            return false;
        }

        return Athena_Date::fromFrToTimestamp($date) > Athena_Date::fromFrToTimestamp($model->date_begin);
    }

    
    /**
     * Validation method to check if the end_subscribe date is superior to the begin_subscribe date
     * 
     * @param String $date
     * @param Model_Periode $model
     * @return boolean
     */
    public static function IsSuperiorToBeginChoise($date, $model) {
        if ($date == null || $model->date_begin_choise == null) {
            return false;
        }

        return Athena_Date::fromFrToTimestamp($date) > Athena_Date::fromFrToTimestamp($model->date_begin_choise);
    }

    /**
     * Override method for saving object with some behaviour,
     * for example handling timestamp element
     * 
     * @param \Validation $validation
     * @return Model_Periode
     */
    public function save(\Validation $validation = NULL) {
        parent::save($validation);
        $this->_validation_required = false;
        $this->date_begin = Athena_Date::fromFrToTimestamp($this->date_begin);
        $this->date_end = Athena_Date::fromFrToTimestamp($this->date_end);
        $this->date_begin_choise = Athena_Date::fromFrToTimestamp($this->date_begin_choise);
        $this->date_end_choise = Athena_Date::fromFrToTimestamp($this->date_end_choise);
        return parent::save($validation);
    }

    /**
     * Override method for getter, to get any column from the model,
     * Used for some behaviour,
     * Especially handling timestamp to String
     * 
     * @param String $column
     * @return various
     */
    public function get($column) {
        if (in_array($column, array('date_begin', 'date_end', 'date_begin_choise', 'date_end_choise'))) {
            if (parent::get($column) != null && Athena_Date::isValidTimestamp(parent::get($column))) {

                return Athena_Date::fromTimestampToFr(parent::get($column));
            }
        }
        return parent::get($column);
    }

}
