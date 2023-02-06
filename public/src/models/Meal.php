<?php

class Meal
{
    public int $id;
    public string $title;
    public string $description;
    public string $price;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
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
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getPrice(): string
    {
        return $this->price;
    }

}