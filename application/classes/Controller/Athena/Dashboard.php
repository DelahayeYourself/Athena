<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Dashboard
 * 
 * Controller for the dashboard of the athena web application
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Dashboard extends Controller_Athena_Athena {

    /**
     * Association of the action/role(s)
     * @var array 
     */
    public $assert_auth_actions = array(
        'index' => array('login'),
    );
    
    /**
     * action_index
     * 
     */
    public function action_index(){
        $this->_template_content('');
    }
}