<?php

namespace Domain\Forum\Entity;

use DateTimeInterface;

class Post
{
    public string $titre = "";
    public string $description = "";
    public ?string $uuid = null;
    public ?DateTimeInterface $createdAt;
    public bool $published;

    /**
     * @param string $titre
     * @param string $description
     * @param string|null $uuid
     * @param DateTimeInterface|null $createdAt
     * @param bool $published
     */
    public function __construct(string $titre, string $description, ?string $uuid, ?DateTimeInterface $createdAt, bool $published)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->uuid = $uuid ?? uniqid();
        $this->createdAt = $createdAt;
        $this->published = $published;
    }

}