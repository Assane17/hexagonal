<?php

namespace Domain\Forum\Entity;

use DateTimeInterface;

class Post
{
    private string $titre ;
    private string $description ;
    private ?string $uuid;
    private ?DateTimeInterface $createdAt;
    private bool $published ;

    /**
     * @param string $titre
     * @param string $description
     * @param string|null $uuid
     * @param DateTimeInterface|null $createdAt
     * @param bool $published
     */
    public function __construct(string $titre,
                                string $description,
                                bool $published,
                                ?DateTimeInterface $createdAt,
                                ?string $uuid = null
    )
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->uuid = $uuid ?? uniqid();
        $this->createdAt = $createdAt;
        $this->published = $published;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string|null $uuid
     */
    public function setUuid(?string $uuid): void
    {
        $this->uuid = $uuid;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getCreatedAt(): ?DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param DateTimeInterface|null $createdAt
     */
    public function setCreatedAt(?DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return bool
     */
    public function isPublished(): bool
    {
        return $this->published;
    }

    /**
     * @param bool $published
     */
    public function setPublished(bool $published): void
    {
        $this->published = $published;
    }



}