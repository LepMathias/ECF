<?php

class Schedules
{
    public int $id;
    public string $day;
    public string $startDej;
    public string $endDej;
    public string $startDin;
    public string $endDin;

    public function getIs(): int
    {
        return $this->id;
    }

    public function getDay(): string
    {
        return $this->day;
    }

    public function getStartDej(): string
    {
        return $this->startDej;
    }

    public function getEndDej(): string
    {
        return $this->endDej;
    }

    public function getStartDin(): string
    {
        return $this->startDin;
    }

    public function getEndDin(): string
    {
        return $this->endDin;
    }

}