<?php
require_once 'controller/Routes.php';
$route = new Routes();
$page=isset($_GET['url'])?$_GET['url']:parse_url(trim($_SERVER['REQUEST_URI'],'/'), PHP_URL_PATH);
if (isset($page)){
$route->action($page);
}else{
    include "public/404.html";
}