<?php

class Image
{
    private ?int $id = null;
    private string $name;
    private string $url;
    private string $alt;

    public function __construct(string $name, string $url)
    {
        $this->name = $name;
        $this->url = $url;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function settId(?int $id): void
    {
        $this->id = $id;
    }

    public function getname(): string
    {
        return $this->name;
    }
    public function setname(string $name): void
    {
        $this->name = $name;
    }

    public function geturl(): string
    {
        return $this->url;
    }
    public function setPost(string $url): void
    {
        $this->url = $url;
    }

    public function getalt(): string
    {
        return $this->alt;
    }
    public function setalt(string $alt): void
    {
        $this->alt = $alt;
    }
}
