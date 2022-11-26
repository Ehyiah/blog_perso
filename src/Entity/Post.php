<?php

namespace App\Entity;

use App\Entity\Traits\IdTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
class Post
{
    use IdTrait;

    #[ORM\Column(nullable: true)]
    private ?string $title;

    #[ORM\Column(nullable: true)]
    private ?string $content;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $publishedAt = null;

    #[ORM\Column]
    private string $quill;

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): void
    {
        $this->content = $content;
    }

    public function getPublishedAt(): ?\DateTimeImmutable
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(?\DateTimeImmutable $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    public function publish(): void
    {
         $this->publishedAt = new \DateTimeImmutable();
    }

    public function unpublish(): void
    {
        $this->publishedAt = null;
    }

    public function getQuill(): string
    {
        return $this->quill;
    }

    public function setQuill(string $quill): void
    {
        $this->quill = $quill;
    }
}
