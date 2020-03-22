<?php

/**
 * This is the main file which receives and analyzes data, 
 * generates response data and finally calls the template.
 */

// show all warnings and errors on the screen
error_reporting(E_ALL);
ini_set('display_errors', 1);

$cities = array ("Cēsis" => "Latvia/Cesu/Cēsis", 
"Daugavpils" => "Latvia/Daugavpils/Daugavpils", 
"Jēkabpils" => "Latvia/Jekabpils/Jēkabpils", 
"Jelgava" => "Latvia/Jelgava/Jelgava", 
"Jūrmala" => "Latvia/Jurmala~/Jūrmala", 
"Liepāja" => "Latvia/Liepaja/Liepāja", 
"Ogre" => "Latvia/Ogres/Ogre", 
"Rēzekne" => "Latvia/Rezekne/Rēzekne", 
"Riga" => "Latvia/Riga/Riga", 
"Salaspils" => "Latvia/Salaspil/Salaspils", 
"Tukums" => "Latvia/Tukuma/Tukums", 
"Valmiera" => "Latvia/Valmieras/Valmiera", 
"Ventspils" => "Latvia/Ventspils/Ventspils");

// DO NOT EDIT BEFORE THIS LINE

/* Functions and classes You might want to use (you have to study function descriptions and examples)
 * Note: You can easily solve this task without using any regular expressions
file_get_contents() http://lv1.php.net/file_get_contents
file_put_contents() http://lv1.php.net/file_put_contents
file_exists() http://lv1.php.net/file_exists
SimpleXMLElement http://php.net/manual/en/simplexml.examples-basic.php http://php.net/manual/en/class.simplexmlelement.php 
date() http://lv1.php.net/manual/en/function.date.php or Date http://lv1.php.net/manual/en/class.datetime.php
Multiple string functions (choose by studying descriptions) http://lv1.php.net/manual/en/ref.strings.php
Multiple variable handling functions (choose by studying descriptions) http://lv1.php.net/manual/en/ref.var.php
Optionally you can use some array functions (with $_GET, $cities) http://lv1.php.net/manual/en/ref.array.php
*/

// Your code goes here

$result = ""; //valid values: empty string, "OK", "ERROR"
$error_message = "";
$date = "";
$city = "";
$forecast = [];

// DO NOT EDIT AFTER THIS LINE

require("view.php");