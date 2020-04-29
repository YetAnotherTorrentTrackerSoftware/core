<?php

namespace App\Entity\Forum;

use App\Entity\Basic\User as BasicUser;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Forum\ThreadRepository")
 */
class Thread
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     */
    private UuidInterface $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicUser $author;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Forum\Forum")
     * @ORM\JoinColumn(nullable=false)
     */
    private Forum $forum;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $locked = false;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $pinned = false;

    public function __construct(string $name, BasicUser $author)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->createdAt = new DateTime();
        $this->author = $author;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getAuthor(): BasicUser
    {
        return $this->author;
    }

    public function setAuthor(BasicUser $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getForum(): Forum
    {
        return $this->forum;
    }

    public function setForum(Forum $forum): self
    {
        $this->forum = $forum;

        return $this;
    }

    public function getLocked(): bool
    {
        return $this->locked;
    }

    public function setLocked(bool $locked): self
    {
        $this->locked = $locked;

        return $this;
    }

    public function getPinned(): bool
    {
        return $this->pinned;
    }

    public function setPinned(bool $pinned): self
    {
        $this->pinned = $pinned;

        return $this;
    }
}
