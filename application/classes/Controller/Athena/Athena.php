<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Athena
 * 
 * Default controller that is used inside the athena application for managing such behaviour like auth managing, role managing, ..
 * This class extend Controller_Template for rendering Template
 * 
 * @extends Controller_Template
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Athena extends Controller_Template {

    /**
     * Variable used to flag if the role managing should be used inside the controller
     * 
     * @var boolean 
     */
    public $assert_auth = TRUE;

    /**
     * Default array for storing authorized action/role(s) 
     * 
     * @var array 
     */
    public $assert_auth_actions = FALSE;

    /**
     * Default template used to render the view
     * @var string 
     */
    public $template = 'athena/base';

    /**
     * before
     * 
     * Override before method for handling auth and access authorized
     */
    public function before() {
        parent::before();
        $this->_user_auth();
    }

    /**
     * _template_content
     * 
     * Simple setter for setting the content var inside the base view,
     * Used for more simple implementation inside the daughter class
     * 
     * @param string $content
     */
    public function _template_content($content) {
        $this->template->content = $content;
    }

    /**
     * _user_auth
     * 
     * Method to handling access and auth autorizing
     */
    public function _user_auth() {
        // Retrieve the current action name
        $action_name = $this->request->action();
        // Check if the assert_auth_actions is set, if the action exist inside and if the current auth user have the appropriate role
        if ($this->assert_auth_actions !== FALSE && array_key_exists($action_name, $this->assert_auth_actions) && !$this->_user_has_roles($this->assert_auth_actions[$action_name])) {
            // Check if user is logged_in
            if (Auth::instance()->logged_in()) {

                // Not authorized so return to the dashboard
                Notices::add('warning', '<b>Erreur!</b> Not authorized.');
                $this->redirect(Route::get('dashboard')->uri());
            } else {
                // If notlogged_in return to login page
                Notices::add('warning', '<b>Erreur!</b> Merci de vous authentifiez.');
                $this->redirect(Route::get('login')->uri());
            }
        }
    }

    /**
     * _user_has_roles
     * 
     * Check if the current logged in user have one of the role given in the arr_roles array
     * 
     * @param array arr_roles
     */
    public function _user_has_roles($arr_roles) {
        $result = false;
        foreach ($arr_roles as $role) {
            if (Auth::instance()->logged_in($role)) {
                $result = true;
            }
        }
        return $result;
    }

}
