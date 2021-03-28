<?php

use JetBrains\PhpStorm\Pure;

class Post
{
    private string $title;
    private string $name;
    private string $content;
    private string $time;

    public function __construct($title, $name, $content, $time)
    {
        $this->title = $title;
        $this->name = $name;
        $this->content = $content;
        $this->time = $time;

    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

}