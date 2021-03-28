<?php

use JetBrains\PhpStorm\NoReturn;

class PostController
{
     private const DISPLAY = 20;


    #[NoReturn] public static function store(): void
    {
        //$messagesInvalid = Input::checkInvalid();

        //if(!empty($messagesInvalid)) {return;}

        PostLoader::savePost(new Post($_SESSION['title'],$_SESSION['name'],$_SESSION['content'],date('l jS \of F Y h:i:s A')));

        header('Location:index.php');
        exit;
    }
    public static function show(): void
    {

        $posts = PostLoader::getAllPosts();
        $toDisplay = min(count($posts), self::DISPLAY);

        require 'view/view.php';
    }

    public static function render(): void
    {
            //TODO Move the validation to a class to centralise validation;




}
}