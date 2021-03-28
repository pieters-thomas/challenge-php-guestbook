<?php

declare(strict_types=1);

use JetBrains\PhpStorm\Pure;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


require 'model/Post.php';
require 'model/PostLoader.php';

require 'controller/PostController.php';

session_start();


$controller = new PostController();

if(!empty($_POST)){
    $controller::store();
}

$controller::show();


