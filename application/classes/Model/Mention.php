<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_Mention
 * 
 * @extends ORM
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_Mention extends ORM {

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
