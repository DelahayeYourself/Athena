<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Model_User
 * 
 * @extends Model_Auth_User
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Model_User extends Model_Auth_User {

    /**
     * override method to return firstname and name of the instance model
     * 
     * @return String
     */
    public function __toString() {
        return $this->firstname . ' ' . $this->name;
    }

    /**
     * Method to check if an user account is confirmed,
     * Aka it had the login role
     * 
     * @return boolean
     */
    public function isConfirmed() {
        $roles = $this->roles->as_array('id', 'name');
        return in_array('login', $roles);
    }

    /**
     * Which entities should be loaded with an instance of Model_User
     * 
     * @var array
     */
    protected $_load_with = array('roles');

    /**
     * Method for validating user's mail,
     * check if the mail is not already used by another account
     * 
     * @param String $email
     * @param Model_User $user
     * @return boolean
     */
    public static function isMailAvailable($email, $user) {
        return (ORM::factory('User')->where('email', '=', $email)->and_where('id', '!=', $user->id)->count_all() == 0) ? true : false;
    }

    /**
     * Method for validation user's username
     * check if the username is not already used by another account
     * 
     * @param String $username
     * @param Model_User $user
     * @return boolean
     */
    public static function isUsernameAvailable($username, $user) {
        return (ORM::factory('User')->where('username', '=', $username)->and_where('id', '!=', $user->id)->count_all() == 0) ? true : false;
    }

    /**
     * rules
     * 
     * return array rules for this model
     * 
     * @return array
     */
    public function rules() {
        $rules = array(
            'username' => array(
                array('not_empty'),
                array('min_length', array(':value', '3')),
                array('max_length', array(':value', '50')),
                array('Model_User::isUsernameAvailable', array(':value', ':model')),
            ),
            'name' => array(
                array('not_empty'),
                array('min_length', array(':value', '3')),
                array('max_length', array(':value', '50')),
            ),
            'firstname' => array(
                array('not_empty'),
                array('min_length', array(':value', '3')),
                array('max_length', array(':value', '50')),
            ),
            'email' => array(
                array('not_empty'),
                array('email'),
                array('Model_User::isMailAvailable', array(':value', ':model')),
                array('min_length', array(':value', '10')),
                array('max_length', array(':value', '50')),
            ),
            'phone' => array(
                array('not_empty'),
                array('min_length', array(':value', '8')),
                array('max_length', array(':value', '20')),
            ),
        );
        return $rules;
    }

}
