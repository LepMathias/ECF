<?php

class picture
{
    private int $id;
    public string $title;
    public string $size;
    public string $type;
    public string $date;
    public picture $file;
    public function getId()
    {
        return $this->id;
    }
}