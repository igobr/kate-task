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

/**
 * Катюха привет!
 * Во view.php имеется form method=GET, отправляемая на index.php (т.е. в ЭТОТ скрипт)
 * PHP интерпретатор поместит значения всех инпутов этой формы (тех у которых есть NAME аттрибут) в массив $_GET
 *
 * Следовательно, тут мы можем обратиться к нужным элементам массива через ключи $_GET['date'] и $_GET['city']
 */

$date = $_GET['date']; // все значения в этом массиве всегда строковые, разбор и валидация — за нами
$city = $_GET['city'];

/**
 * Теперь, когда мы обратились к элементам массива, мы можем попасть в следующие ситуации:
 * - такого ключа в массиве нет вообще (достигается хакерским способом через инспект-элемент в браузере или обычный CURL запрос
 * с передачей одного поля вместо двух или просто пустого запроса без query params)
 * - значение по ключу равно пустоте (никогда нельзя полагаться на валидацию, которая реализована на стороне view,
 * ее можно обойти способом из первого кейса)
 * - значение по ключу имеет невалидный формат (равноценно второму кейсу, пишу отдельно потому что проверяя ЭТОТ кейс, забывают
 * о втором :D, например не парсится как число или как datetime)
 * - значение по ключу запрещено (например не входит в white-list как в случае с городами)
 * - значение по ключу соответствуюет ожиданиям — HAPPY PATH
 */

// Принцип, по которому проще всего пройти валидации — одну за другой:
// в след шаг заходим ТОЛЬКО если предыдущий сработал
$error_message = "";
if ($error_message === "") {
    // проверяем шаг валидации
    // ..
    if ($validationCondition1Failed) {
        $error_message = "Houston, we have a problem 1";
    }
}
if ($error_message === "") {
    // проверяем шаг валидации
    // ..
    if ($validationCondition2Failed) {
        $error_message = "Houston, we have a problem 2";
    }
}
if ($error_message === "") {
    // проверяем шаг валидации
    // ..
    if ($validationCondition3Failed) {
        $error_message = "Houston, we have a problem 3";
    }
}
// подводим итог валидации
if ($error_message !== "") {
    $result = "ERROR";
    require("view.php");
    // и умираем
    die();
}

/**
 * Теперь — можем обращаться к удаленному сервису получения информации о broadcast
 * Обрати внимание на возвращаемые значения file_get_contents, PHP любит возвращать FALSE в случае фейлов,
 * потому нужно будет использовать if (file_get_contents($resource) !== false) - strict comparison
 *
 * Для работы файлового кеша не забудь создать директорию если ее еще нет на момент работы СКРИПТА:
 *
 * if (!file_exists('path/to/directory')) {
 *     mkdir('path/to/directory', 0777, true); // 0777 это аналог a+w, a+x, a+r (писать, выполнять, читать — можно всем)
 * }
 */

$result = ""; //valid values: empty string, "OK", "ERROR"
$error_message = "";
$forecast = [];

// DO NOT EDIT AFTER THIS LINE

require("view.php");
