<?php

use JetBrains\PhpStorm\Pure;

class Post
{
    private string $title;
    private string $name;
    private string $content;
    private string $time;



    public function __construct(?array $input)
    {


    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getTime(): string
    {
        return $this->time;
    }


    public function printPost(): void
    {
        echo 'this is going to be a post';
    }

}