<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Athena_Request
 * 
 * Class for manipulating uri..
 * 
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Athena_Request {

    /**
     * currentURI
     * 
     * Static method for returning current URI
     * 
     * @return String
     */
    public static function currentURI() {
        return URL::base(true) . Request::initial()->uri();
    }

    /**
     * isCurrentQueryParam
     * 
     * Static method for checking if the passed query param with value,
     * Is in current query
     * 
     * @param string $key
     * @param string $value
     * @return boolean
     */
    public static function isCurrentQueryParam($key, $value) {
        return Request::initial()->query('letter') != null && Request::initial()->query('letter') == $value;
    }

    /**
     * isCurrentController
     * 
     * Static method for checking if the current controller is the given controller in param
     * 
     * @param string $controller_name
     * @return boolean
     */
    public static function isCurrentController($controller_name) {
        return strtolower(Request::initial()->current()->controller()) == $controller_name;
    }

    /**
     * isCurrentControllerActionParam
     * 
     * Static method for checking if the current controller, action and param value,
     * Are the ones given by parameters
     * 
     * @param string $controller_name
     * @param string $action_name
     * @param string $param_value
     * @return boolean
     */
    public static function isCurrentControllerActionParam($controller_name, $action_name, $param_value) {
        return Athena_Request::isCurrentController($controller_name) &&
                Athena_Request::isCurrentControllerAction($controller_name, $action_name) &&
                strtolower(Request::initial()->current()->param('id')) == strtolower($param_value);
    }

    /**
     * isCurrentControllerAction
     * 
     * Static method for checking if the current controller and action values
     * Are the ones given by parameters
     * 
     * @param string $controller_name
     * @param string $action_name
     * @return boolean
     */
    public static function isCurrentControllerAction($controller_name, $action_name) {
        return Athena_Request::isCurrentController($controller_name) &&
                strtolower(Request::initial()->current()->action()) == strtolower($action_name);
    }

}
