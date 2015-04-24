<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Athena_Auth
 * 
 * Class for handling some verification with auth module,
 * Like which roles user have, etc.
 * 
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Athena_Auth {
    
    /**
     * isAuthUserStudentAccount
     * 
     * Static method to check if current logged in user is a student account
     * 
     * @return boolean
     */
    public static function isAuthUserStudentAccount(){
        return Auth::instance()->get_user()->hasRoleByRoleName('etudiant');
    }
    
    /**
     * isAuthUserAdminAccount
     * 
     * Static method to check if current logged in user is an admin account
     * 
     * @return boolean
     */
    public static function isAuthUserAdminAccount(){
        return Auth::instance()->get_user()->hasRoleByRoleName('admin');
    }
}