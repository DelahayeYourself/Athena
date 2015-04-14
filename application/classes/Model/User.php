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
     * Array to store account type
     * @var array 
     */
    protected static $assert_account_types = array(
        0 => 'account.type.student',
        1 => 'account.type.admin',
    );

    /**
     * Flags that indicate if the user is confirmed or not
     * 
     * @var Boolean 
     */
    public $isConfirmed = false;

    /**
     * Belongs to entity for Model_User
     * 
     * @var array
     */
    protected $_belongs_to = array(
        'parcour' => array('model' => 'Parcour', 'foreign_key' => 'parcour_id'),
    );

    /**
     * Which entities should be loaded with an instance of Model_User
     * 
     * @var array
     */
    protected $_load_with = array('roles');

    /**
     * __construct
     * 
     * Override construct method for adding simple check to test if user is confirmed
     * 
     * @param Model_User $id
     */
    public function __construct($id = NULL) {
        parent::__construct($id);
        $this->isConfirmed = $this->isConfirmed();
    }

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
        return $this->has('roles', ORM::factory('Role')->where('name', '=', 'login')->find());
    }

    /**
     * clearRoles
     * 
     * Method for clearing (removing) all roles that a user have,
     * You can specify which roles you don't won't to remove for this user
     * 
     * @param array $except
     */
    public function clearRoles($except = array()) {
        foreach ($this->roles->find_all() as $role) {
            if (!in_array($role->name, $except)) {
                $this->remove('roles', $role);
            }
        }
    }

    /**
     * addRoleByRoleName
     * 
     * Method for adding role by role name to the user instance
     * 
     * @param string $role_name
     */
    public function addRoleByRoleName($role_name) {
        try {
            $this->add('roles', ORM::factory('Role')->where('name', '=', $role_name)->find());
        } catch (Exception $ex) {
            Notices::add('warning', __('Users.account.roles.add.generic.error'));
        }
    }

    /**
     * hasRoleByRoleName
     * 
     * Method to check if user instance have the given rol in param
     * 
     * @param string $role_name
     * @return boolean
     */
    public function hasRoleByRoleName($role_name) {
        return $this->has('roles', ORM::factory('Role')->where('name', '=', $role_name)->find());
    }

    /**
     * setRolesByAccountType
     * 
     * Method for setting roles to a particular account type given in parameters
     * 
     * @param int $account_type
     */
    public function setRolesByAccountType($account_type) {
        switch ($account_type) {
            case 0: $this->addRoleByRoleName('etudiant');
                break;
            case 1: $this->addRoleByRoleName('admin');
                break;
        }
    }

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
     * activateArrayAccountId
     * 
     * Activate all account by adding the login role for the given id in params
     * 
     * @param array $arr_users_id
     */
    public static function activateArrayAccountId($arr_users_id) {
        foreach ($arr_users_id as $user_id) {
            try {
                $user = ORM::factory('User', $user_id);
                if ($user != null) {
                    $user->add('roles', ORM::factory('role')->where('name', '=', 'login')->find());
                }
            } catch (Exception $ex) {
                
            }
        }
    }

    /**
     * removeArrayAccountId
     * 
     * Remove all account for the given ids in params
     * 
     * @param array $arr_users_id
     */
    public static function removeArrayAccountId($arr_users_id) {
        foreach ($arr_users_id as $user_id) {
            try {
                $user = ORM::factory('User', $user_id);
                if ($user != null) {
                    $user->delete();
                }
            } catch (Exception $ex) {
                
            }
        }
    }

    /**
     * arrayAccountTypesI18n
     * 
     * Static method for returning translating account type in an array 
     * 
     * @return array
     */
    public static function arrayAccountTypesI18n() {
        $arr = array();
        foreach (Model_User::$assert_account_types as $index => $type_i18n) {
            $arr[$index] = __($type_i18n);
        }
        return $arr;
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
