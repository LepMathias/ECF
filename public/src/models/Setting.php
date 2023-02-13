<?php

class Setting
{
    public int $id;
    public string $name;
    public string $content;

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getContent(): string
    {
        return $this->content;
    }

}