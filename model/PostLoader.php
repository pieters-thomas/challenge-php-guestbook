<?php


class PostLoader
{
    private const STORAGE = 'guestLog.txt';

    public static function getAllPosts(): array
    {
        $posts = [];

        try {
            $json = json_decode(file_get_contents(self::STORAGE), true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException) {
            echo 'JSON error decode!';
        }

        foreach ($json as $post) {
            $post = new Post($post['title'], $post['name'], $post['content'], $post['time']);
            $posts[] = $post;
        }
        return $posts;

    }

    public static function savePost(Post $post): void
    {
        $posts = self::getAllPosts();
        array_unshift($posts, $post);

        foreach ($posts as &$rawPost) {
            $rawPost = [
                'title' => $rawPost->getTitle(),
                'name' => $rawPost->getName(),
                'content' => $rawPost->getContent(),
                'time' => $rawPost->getTime()
            ];
        }
        unset($rawPost);

        try {
            file_put_contents(self::STORAGE, json_encode($posts, JSON_THROW_ON_ERROR));
        } catch (JsonException) {
            echo 'JSON ERROR encode!';
        }
    }

}