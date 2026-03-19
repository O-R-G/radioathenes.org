<?php 
$request = $_SERVER['REQUEST_URI'];
$requestclean = strtok($request,"?");
$uri = explode('/', $requestclean);
require_once("GLOBAL/head.php"); 

if($view === 'home') {
        require_once(__DIR__ . '/views/home.php');
} else if($view === 'about') {
        require_once(__DIR__ . '/views/about.php');
} else {
        require_once(__DIR__ . '/views/404.php');
}

echo "\n\n\n\n\n";
require_once("GLOBAL/foot.php"); 
?>
