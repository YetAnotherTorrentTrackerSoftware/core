<?php

namespace App\Entity\Tracker;

use App\Entity\Basic\Torrent as BasicTorrent;
use App\Entity\Basic\User as BasicUser;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tracker\TorrentCommentRepository")
 */
class TorrentComment
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     */
    private UuidInterface $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\Torrent")
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicTorrent $basicTorrent;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicUser $basicUser;

    /**
     * @ORM\Column(type="text")
     */
    private string $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $createdAt;

    public function __construct(BasicTorrent $basicTorrent, BasicUser $basicUser, string $content)
    {
        $this->id = Uuid::uuid4();
        $this->basicTorrent = $basicTorrent;
        $this->basicUser = $basicUser;
        $this->content = $content;
        $this->createdAt = new DateTime();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getBasicTorrent(): BasicTorrent
    {
        return $this->basicTorrent;
    }

    public function setBasicTorrent(BasicTorrent $basicTorrent): self
    {
        $this->basicTorrent = $basicTorrent;

        return $this;
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

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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
}
