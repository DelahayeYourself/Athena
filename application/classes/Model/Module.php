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
     * Description of the module parsed on the load of the object with the parsedown lib,
     * Desc is stored as Markdown in database
     * 
     * @var String
     */
    public $parsed_desc;

    /**
     * __construct
     * 
     * Override default behaviour
     * For adding the parser of the description in the parsed_desc attributes
     * If the desc attribute is not empty 
     * 
     * @param type $id
     */
    public function __construct($id = NULL) {
        parent::__construct($id);
        if ($this->desc != NULL) {
            $this->parsed_desc = Parsedown::instance()->parse($this->desc);
        }
    }

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
     * get
     * 
     * Return the column specified with the column param,
     * Override the get method from ORM for parsing the desc
     * 
     * @param String $column
     * @return various
     */

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
