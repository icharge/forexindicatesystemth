<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}
/**
 * Custom Helper
 * 
 * ตัวช่วยสำหรับ Project
 * 
 * @author  Norrapat Nimmanee
 * @access  public
 */


if (!function_exists('startsWith')) {

    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== FALSE;
    }

}

if (!function_exists('endsWith')) {

    function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
    }

}

if (!function_exists('is_active')) {

    function is_active($item, $level = 1, $str = 'open') {
        $CI = & get_instance();
        return ($CI->uri->segment($level) == $item ? $str : '');
    }

}