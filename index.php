<?php

$message = "Hello World";
$file = 'guestLog.txt';







file_put_contents($file, $message, FILE_APPEND);

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $_SESSION['title']='';
    $_SESSION['name']='';
    $_SESSION['message']='';




}

require 'templates/template.php';
