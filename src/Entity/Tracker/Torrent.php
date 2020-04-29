<?php declare(strict_types=1);

namespace App\Entity\Tracker;

use App\Entity\Basic\Torrent as BasicTorrent;
use App\Entity\Basic\User;
use App\Entity\Basic\User as BasicUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tracker\TorrentRepository")
 * @ORM\Table(name="tracker_torrent")
 */
class Torrent
{
    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity="App\Entity\Basic\Torrent", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicTorrent $basicTorrent;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private ?string $description;

    /**
     * @ORM\Column(type="integer")
     */
    private int $timesCompleted = 0;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Basic\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicUser $uploader;

    /**
     * @ORM\Column(type="boolean")
     */
    private bool $anonymous = false;

    public function __construct(BasicTorrent $basicTorrent)
    {
        $this->basicTorrent = $basicTorrent;
    }

    public function getBasicTorrent(): BasicTorrent
    {
        return $this->basicTorrent;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTimesCompleted(): int
    {
        return $this->timesCompleted;
    }

    public function setTimesCompleted(int $timesCompleted): self
    {
        $this->timesCompleted = $timesCompleted;

        return $this;
    }

    public function getUploader(): ?User
    {
        return $this->uploader;
    }

    public function setUploader(User $uploader): self
    {
        $this->uploader = $uploader;

        return $this;
    }

    public function getAnonymous(): bool
    {
        return $this->anonymous;
    }

    public function setAnonymous(bool $anonymous): self
    {
        $this->anonymous = $anonymous;

        return $this;
    }
}
