<?php
/*
Created by Saptak
*/

require_once 'core/init.php';

function escape($string) {
    return htmlentities($string, ENT_QUOTES, 'UTF-8');
}