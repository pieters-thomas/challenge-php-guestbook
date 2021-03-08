<?php

declare(strict_types=1);

use JetBrains\PhpStorm\Pure;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'Post.php';
require 'Postloader.php';
require 'templates/template.php';

session_start();
function reportError($error):string {

    return "<div class='alert alert-warning' role='alert'>" .$error."</div>" .PHP_EOL;
}

#[Pure] function checkProfanity(string $input): bool
{
    $profanityFilter= ['frog','newt'];
    $profane = false;
    foreach ($profanityFilter AS $badWord){
        if(str_contains($input, $badWord)){
            $profane = true;
        }
    }
    return $profane;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //TODO Move the validation to a class to centralise validation;

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
    if (checkProfanity($newPost['title'])){
        $errors[] = 'You used a no-no word, you dumb fuck!';
    }
    if (empty($newPost['name'])) {
        $errors[] = 'Remember to sign your work.';
    }
    if (empty($newPost['content'])) {
        $errors[] = 'A message is required';
    }

    if (empty($errors)) {
        $newPost['time'] = date('l jS \of F Y h:i:s A');
        $_SESSION['newPost'] = $newPost;
    } else {
        $_SESSION['errors'] = $errors;
    }

    header("Location: index.php");
    exit;
}

if (isset($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
       echo reportError($error);
    }
    unset($_SESSION['errors']);
}

$postLoader = new Postloader($_SESSION['newPost'] ?? null);
$postLoader->displayPosts();

unset($_SESSION['newPost']);

