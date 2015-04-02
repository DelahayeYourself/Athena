<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Athena_Date
 * 
 * Class for validating and converting date and timestamp,
 * Currently work only with fr form (d.m.Y H:i),
 * Shoud be update for handling more format
 * 
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Athena_Date {

    
    /**
     * fromFrToTimestamp
     * 
     * Return a fr formatted date string to a unix timestamp
     * 
     * @param String $date_format_fr
     * @return int
     */
    public static function fromFrToTimestamp($date_format_fr) {
        $arr = explode(' ', $date_format_fr);

        $arr_date = $arr_hours = null;

        if (isset($arr[1])) {
            $arr_date = strptime($arr[0], '%d.%m.%Y');
            $arr_hours = explode(':', $arr[1]);
        } else {
            $arr_date = strptime($date_format_fr, '%d.%m.%Y');
            $arr_hours = array(0, 0, 0);
        }

        $timestamp = mktime($arr_hours[0], $arr_hours[1], 0, $arr_date['tm_mon'] + 1, $arr_date['tm_mday'], $arr_date['tm_year'] + 1900);

        return $timestamp;
        //return strtotime($arr_date[1] . '/' . $arr_date[0] . '/' . $arr_date[2] . ' ' . $arr_hours);
    }

    /**
     * fromTimestampToFr
     * 
     * Return an unix timestamp to a formatted fr date string
     * 
     * @param int $timestamp
     * @return string
     */
    public static function fromTimestampToFr($timestamp) {
        return date('d.m.Y H:i', $timestamp);
    }

    /**
     * isValid
     * 
     * Check if is a valid date
     * 
     * @param string $date_to_check
     * @return boolean
     */
    public static function isValid($date_to_check) {
        return Athena_Date::validateDate($date_to_check);
    }

    /**
     * validateDate
     * 
     * Validate a date by a given format,
     * Defaut format is d.m.Y H:i
     * 
     * @param string $date
     * @param string $format
     * @return boolean
     */
    public static function validateDate($date, $format = 'd.m.Y H:i') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    /**
     * isValidTimestamp
     * 
     * Check if a given timestamp is a valid Unix Timestamp
     * 
     * @param int $timestamp
     * @return boolean
     */
    public static function isValidTimestamp($timestamp) {
        if (!is_numeric($timestamp) || $timestamp == null) {
            return false;
        }
        try {
            $month = date('m', $timestamp);
            $day = date('d', $timestamp);
            $year = date('Y', $timestamp);
            return checkdate($month, $day, $year);
        } catch (Exception $e) {
            return false;
        }
    }

}
