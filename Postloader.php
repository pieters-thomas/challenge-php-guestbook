<?php


class Postloader
{

    private array $postLog;
    private const STORAGE = './guestLog.txt';
    private const TO_DISPLAY = 20;

    public function __construct( ?array $input)
    {
        try {
            $json = json_decode(file_get_contents(self::STORAGE), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) { echo 'JSON error decode!';
        return;
        }
        var_dump($json);
        $this->postLog = $json??[];

        if (isset($input) && !empty($input)){

            array_unshift($this->postLog,$input);
            var_dump($input);
        }

        var_dump($this->postLog);

        try {
            $msg = json_encode($this->postLog, JSON_THROW_ON_ERROR);
        } catch (JsonException) { echo 'JSON ERROR encode!';
        return;
        }

        file_put_contents(self::STORAGE, $msg);

    }

    public function displayPosts(): void
    {
        for ($i=0; $i <  min( count($this->postLog) ,self::TO_DISPLAY)  ;$i++){
            $post = new Post($this->postLog[$i]);
            $post->printPost();
        }

    }


}