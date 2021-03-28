<?php


use JetBrains\PhpStorm\Pure;

class Input
{
    public static function checkInvalid(): array
    {

    }

    #[Pure] function testInput($input): string
    {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input, ENT_NOQUOTES);
        return $input;
    }

    function render()
    {
        $newPost = $_POST;
        $errors = [];

        foreach ($newPost as $item => $value) {
            $newPost[$item] = testInput($value);
        }

        if (empty($newPost['title'])) {
            $errors[] = 'A title is required';

        }
        if (checkProfanity($newPost['title'])) {
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


        if (isset($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo reportError($error);
            }
            unset($_SESSION['errors']);
        }


        #[Pure] function checkProfanity(string $input): bool
        {
            $profanityFilter = ['frog', 'newt'];
            $profane = false;
            foreach ($profanityFilter as $badWord) {
                if (str_contains($input, $badWord)) {
                    $profane = true;
                }
            }
            return $profane;
        }

    }
}