<?php


class Postloader
{

    private array $postLog;
    private const STORAGE = 'guestLog.txt';
    private const TO_DISPLAY = 20;

    public function __construct(?array $input)
    {
        $this->readFile();

        if (isset($input) && !empty($input)) {

            array_unshift($this->postLog, $input);
            var_dump($input);
        }

        $this->writeToFile();

    }

    private function readFile(): void
    {
        try {
            $json = json_decode(file_get_contents(self::STORAGE), true, 512, JSON_THROW_ON_ERROR);
            $this->postLog = $json ?? [];
        } catch (JsonException) {
            echo 'JSON error decode!';
        }
    }

    private function writeToFile(): void
    {
        try {
            file_put_contents(self::STORAGE, json_encode($this->postLog, JSON_THROW_ON_ERROR));
        } catch (JsonException) {
            echo 'JSON ERROR encode!';
        }
    }

    public function displayPosts(): void
    {
        for ($i = 0; $i < min(count($this->postLog), self::TO_DISPLAY); $i++) {
            $post = new Post($this->postLog[$i]);
            $post->printPost();
        }

    }


}