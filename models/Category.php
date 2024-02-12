<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Category
{
    private ?int $id = null;
    private string $name;
    private string $description;
    private array $products = [];

    public function __construct(string $name, string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id): void
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

    public function getDescription(): string
    {
        return $this->description;
    }
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getProducts(): array
    {
        return $this->products;
    }
    public function setProducts(array $products): void
    {
        $this->products = $products;
    }
}
