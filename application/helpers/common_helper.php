<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('calculate_age')) {
    function calculate_age($dob)
    {

        $dob1 = new DateTime($dob);
        $today   = new DateTime('today');
        $year = $dob1->diff($today)->y;
        $month = $dob1->diff($today)->m;
        $day = $dob1->diff($today)->d;
        return array("years" => $year, "months" => $month, "days" => $day);
    }
}
