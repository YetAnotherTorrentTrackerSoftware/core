<?php

namespace App\Entity\Forum;

use App\Entity\Basic\User as BasicUser;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Forum\PostRepository")
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     */
    private UuidInterface $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicUser $basicUser;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $createdAt;

    /**
     * @ORM\Column(type="text")
     */
    private string $content = '';

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Forum\Thread")
     * @ORM\JoinColumn(nullable=false)
     */
    private Thread $thread;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?DateTimeInterface $updatedAt;

    public function __construct(BasicUser $basicUser, Thread $thread)
    {
        $this->id = Uuid::uuid4();
        $this->basicUser = $basicUser;
        $this->createdAt = new DateTime();
        $this->thread = $thread;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getBasicUser(): BasicUser
    {
        return $this->basicUser;
    }

    public function setBasicUser(BasicUser $basicUser): self
    {
        $this->basicUser = $basicUser;

        return $this;
    }

    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getThread(): Thread
    {
        return $this->thread;
    }

    public function setThread(Thread $thread): self
    {
        $this->thread = $thread;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(?DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
