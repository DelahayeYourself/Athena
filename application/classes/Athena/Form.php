<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Athena_Form
 * 
 * A simple class for handling error in bootstrap 3 form
 * 
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Athena_Form {

    /**
     * hasError
     * 
     * return a custom class if fieldname is in errors array
     * 
     * @param array $errors
     * @param string $fieldname
     * @return string
     */
    public static function hasError($errors, $fieldname) {
        if (is_array($errors) && Arr::get($errors, $fieldname)) {
            return 'has-error';
        }
    }

    /**
     * getErrorMessage
     * 
     * Render a message error view for displaying inside a bootstrap 3 form
     * 
     * @param array $errors
     * @param string $fieldname
     * @return string
     */
    public static function renderErrorMessage($errors, $fieldname) {
        if (is_array($errors) && Arr::get($errors, $fieldname)) {
            $error = Arr::get($errors, $fieldname);
            $title = 'Oups!';
            return View::factory('athena/general/messages/error')
                            ->bind('title', $title)
                            ->bind('message', $error)
                            ->render();
        }
    }

}
