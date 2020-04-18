<?php declare(strict_types=1);

namespace App\Entity\Tracker;

use App\Entity\Basic\User as BasicUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tracker\UserRepository")
 * @ORM\Table(name="tracker_user")
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\OneToOne(targetEntity="App\Entity\Basic\User", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicUser $basicUser;

    /**
     * @ORM\Column(type="integer")
     */
    private int $uploaded = 0;

    /**
     * @ORM\Column(type="integer")
     */
    private int $downloaded = 0;

    public function __construct(BasicUser $basicUser)
    {
        $this->basicUser = $basicUser;
    }

    public function getBasicUser(): ?BasicUser
    {
        return $this->basicUser;
    }

    public function getUploaded(): int
    {
        return $this->uploaded;
    }

    public function setUploaded(int $uploaded): self
    {
        $this->uploaded = $uploaded;

        return $this;
    }

    public function getDownloaded(): int
    {
        return $this->downloaded;
    }

    public function setDownloaded(int $downloaded): self
    {
        $this->downloaded = $downloaded;

        return $this;
    }
}
