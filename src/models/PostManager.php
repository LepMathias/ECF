<?php

class PostManager
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function addFeedback(int $note, string $title, string $message)
    {
        $statement = $this->pdo->prepare('INSERT INTO posts (note, title, message) 
VALUES (:note, :title, :message)');
        $statement->bindValue(':note', $note);
        $statement->bindValue(':title', $title);
        $statement->bindValue(':message', $message);

        return $statement->execute();
    }
    public function getPosts()
    {
        require_once 'Post.php';
        $statement = $this->pdo->prepare('SELECT * FROM posts');
        $statement->setFetchMode(PDO::FETCH_CLASS, 'Post');
        $statement->execute();

        return $statement->fetchAll();
    }
}