<?php
/**
 *  W1 Music website - Functions 
 * 
 * This file contains a function library
 *
 * Source: http://stackoverflow.com/questions/7127204/converting-seconds-to-hhmmss
 *
 */

/**
 * Function convert a total of seconds in minutes and seconds following this format (mm:ss)
 * @param string $money
 * @param boolean $padHours
 * @return string
 */

function sec2hms ($sec, $padHours = false) 
{
	$hms = "";
	
	// This part of the fuction gives the time in hours. I do not need it. 
	//$hours = intval(intval($sec) / 3600);
	//$hms .= ($padHours)
	//? str_pad($hours, 2, "0", STR_PAD_LEFT). ':'
	//: $hours. ':';
	
	$minutes = intval(($sec / 60) % 60);
	$hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ':';
	$seconds = intval($sec % 60);
	$hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);
return $hms;
}


?>