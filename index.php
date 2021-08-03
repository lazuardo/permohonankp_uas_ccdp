<?php

require_once('init.php');



$request_uri = $_SERVER['REQUEST_URI'];
$url_segment = explode("/", $request_uri);


if (!isset($url_segment[3])) {
    $controller = "Auth"; 
} else {
    if ($url_segment[3] == "") {
        $controller = "Auth";
    } else {
        $controller = $url_segment[3];
    }
}

if (!isset($url_segment[4])) {
    $method = "index"; 
} else {
    if ($url_segment[4] == "") {
        $method = "index";
    } else {
        $method = $url_segment[4];
    }
}


$classname = $controller;
$obj = new $classname($method);