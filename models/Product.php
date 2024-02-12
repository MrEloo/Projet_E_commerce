<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Product
{
    private ?int $id = null;
    private string $name;
    private string $description;
    private int $price;
    private string $imageName;
    private string $imageUrl;
    private string $imageAlt;
    private Category $category;


    public function __construct(string $name, string $description, int $price, string $imageName, string $imageUrl, string $imageAlt, Category $category)
    {
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->imageName = $imageName;
        $this->imageUrl = $imageUrl;
        $this->imageAlt = $imageAlt;
        $this->category = $category;
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

    public function getPrice(): string
    {
        return $this->price;
    }
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    public function getImageName(): string
    {
        return $this->imageName;
    }
    public function setImageName(string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }
    public function setImageUrl(string $imageUrl): void
    {
        $this->imageUrl = $imageUrl;
    }

    public function getImageAlt(): string
    {
        return $this->imageAlt;
    }
    public function setImageAlt(string $imageAlt): void
    {
        $this->imageAlt = $imageAlt;
    }

    public function getCategory(): Category
    {
        return $this->category;
    }
    public function setCategory(Category $category): void
    {
        $this->category = $category;
    }
}
