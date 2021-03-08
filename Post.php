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
        $this->title = $input['title'];
        $this->name = $input['name'];
        $this->content = $input['content'];
        $this->time = $input['time'];

    }

    //TODO Improve visual stylings of how posts are represented


    private function printTitle (): void
    {
        echo "<div class=postTitle><h3>".$this->title."</h3></div>";
    }
    private function printTime (): void
    {
        echo "<div class=postTime>".$this->time."</div>";
    }
    private function printContent (): void
    {
        echo "<div class=postContent>".$this->content."</div>";
    }
    private function printName (): void
    {
        echo "<div class=postName><i>Sincerely ". $this->name ."</i></div>";
    }

    public function printPost(): void
    {
        $html=
            "<div class='postBlock royal'>".
            "<div class='royal'>
            </div>".
            " <div class='royal'>".
            $this->printTitle().
            "<div>".
            $this->printContent().
            $this->printName().
            "</div class='royal'>".
            $this->printTime()
            ."</div>
            </div>";

        echo $html;
    }

}