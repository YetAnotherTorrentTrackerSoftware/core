<?php

namespace App\Entity\Forum;

use App\Entity\Basic\User as BasicUser;
use DateTime;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Forum\PostReportRepository")
 */
class PostReport
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
    private BasicUser $reporter;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Forum\Post")
     * @ORM\JoinColumn(nullable=false)
     */
    private Post $post;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $reason = '';

    /**
     * @ORM\Column(type="datetime")
     */
    private DateTimeInterface $reportedAt;

    /**
     * @ORM\Column(type="datetime")
     */
    private ?DateTimeInterface $treatedAt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private ?BasicUser $treatedBy;

    public function __construct(BasicUser $reporter, Post $post)
    {
        $this->id = Uuid::uuid4();
        $this->reporter = $reporter;
        $this->post = $post;
        $this->reportedAt = new DateTime();
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getReporter(): BasicUser
    {
        return $this->reporter;
    }

    public function setReporter(BasicUser $reporter): self
    {
        $this->reporter = $reporter;

        return $this;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(Post $post): self
    {
        $this->post = $post;

        return $this;
    }

    public function getReason(): ?string
    {
        return $this->reason;
    }

    public function setReason(string $reason): self
    {
        $this->reason = $reason;

        return $this;
    }

    public function getReportedAt(): ?DateTimeInterface
    {
        return $this->reportedAt;
    }

    public function setReportedAt(DateTimeInterface $reportedAt): self
    {
        $this->reportedAt = $reportedAt;

        return $this;
    }

    public function getTreatedAt(): ?DateTimeInterface
    {
        return $this->treatedAt;
    }

    public function setTreatedAt(DateTimeInterface $treatedAt): self
    {
        $this->treatedAt = $treatedAt;

        return $this;
    }

    public function getTreatedBy(): ?BasicUser
    {
        return $this->treatedBy;
    }

    public function setTreatedBy(?BasicUser $treatedBy): self
    {
        $this->treatedBy = $treatedBy;

        return $this;
    }
}
