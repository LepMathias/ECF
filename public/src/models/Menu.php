<?php

class Menu
{
     private int $id;
     public string $title;
     public string $description;
     public string $price;
    public string $availability;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): string
    {
        return $this->price;
    }

    public function getAvailability(): string
    {
        return $this->availability;
    }
}