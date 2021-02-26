<?php

declare(strict_types=1);

use JetBrains\PhpStorm\Pure;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Post.php';
require 'Postloader.php';

session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    #[Pure] function testInput($input): string
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input, ENT_NOQUOTES);
        return $input;
    }

    $newPost = $_POST;
    $errors = [];

    foreach ($newPost as $item => $value) {
        $newPost[$item] = testInput($value);
    }

    if (empty($newPost['title'])) {
        $errors[] = 'A title is required';
    }
    if (empty($newPost['name'])) {
        $errors[] = 'A name is required';
    }
    if (empty($newPost['content'])) {
        $errors[] = 'A message is required';
    }

    if (empty($errors)) {
        $newPost[] = date('l jS \of F Y h:i:s A');
        $_SESSION['newPost'] = $newPost;
    } else {
        $_SESSION['errors'] = $errors;
    }

    header("Location: index.php");
    exit;
}

if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo $error;
    }
    unset($_SESSION['errors']);
}

$postLoader = new Postloader($_SESSION['newPost'] ?? null);
$postLoader->displayPosts();

unset($_SESSION['newPost']);
require 'templates/template.php';
