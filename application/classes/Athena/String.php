<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Athena_String
 * 
 * Class for manipulating some string..
 * 
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Athena_String {

    /**
     * format
     * 
     * Simple implementation of the C# String.Format that should exist in PHP (IMHO),
     * to use it simply call Athena_String::format('[0]', $var)
     * 
     * @param String $format
     * @param args passed var for formatting with the format parameters
     * @return String
     */
    public static function format($format /* , ... */) {
        $args = func_get_args();
        return preg_replace_callback('/\[(\\d)\]/', function($m) use($args) {
            // might want to add more error handling here...
            return $args[$m[1] + 1];
        }, $format
        );
    }
    
    /**
     * rangeFromAToZ
     * 
     * Static methods for returning chars from A to Z in an array
     * 
     * @return array
     */
    public static function rangeFromAToZ(){
        return range('A', 'Z');
    }

}
