<?php

/**
 * @author : Gaellan
 * @link : https://github.com/Gaellan
 */


class Order
{
    private ?int $id = null;
    private User $user;
    private string $created_at;

    public function __construct(User $user, string $created_at)
    {
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function settId(?int $id): void
    {
        $this->id = $id;
    }

    public function getuser(): User
    {
        return $this->user;
    }
    public function setuser(User $user): void
    {
        $this->user = $user;
    }

    public function getcreated_at(): string
    {
        return $this->created_at;
    }
    public function setcreated_at(string $created_at): void
    {
        $this->created_at = $created_at;
    }
}
