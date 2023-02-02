<?php
class Post
{
    public int $note;
    public string $title;
    public string $message;

    public function getNote(): int
    {
        return $this->note;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}