<?php

class Post
{
    private string $title;
    private string $name;
    private string $message;
    private string $time;


    public function __construct()
    {
        $this->title = $_SESSION['title'];
        $this->name = $_SESSION['name'];
        $this->message = $_SESSION['message'];



    }


}