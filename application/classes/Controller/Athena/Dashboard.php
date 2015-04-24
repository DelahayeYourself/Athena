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
    public function action_index() {

        if (Athena_Auth::isAuthUserStudentAccount()) {
            /**
             * Dashboard for student user account
             */
            $periodes = Auth::instance()->get_user()->parcour->periodes->find_all();
            
            $this->_template_content(View::factory('athena/dashboard/student/index')->bind('periodes', $periodes)->render());
        } elseif (Athena_Auth::isAuthUserAdminAccount()) {
            /**
             * Dashboard for admin user account
             */
            $this->_template_content('');
        } else {
            /**
             * Default rendering if something went wrong should never happened!
             */
            $this->_template_content(View::factory('athena/dashboard/default')->render());
        }
    }

}
