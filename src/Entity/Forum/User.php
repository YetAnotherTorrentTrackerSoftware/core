<?php declare(strict_types=1);

namespace App\Entity\Forum;

use App\Entity\Basic\User as BasicUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Forum\UserRepository")
 * @ORM\Table(name="forum_user")
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private string $image;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private string $about;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private string $signature;

    public function __construct(BasicUser $basicUser)
    {
        $this->basicUser = $basicUser;
    }

    public function getBasicUser(): ?BasicUser
    {
        return $this->basicUser;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAbout(): ?string
    {
        return $this->about;
    }

    public function setAbout(?string $about): self
    {
        $this->about = $about;

        return $this;
    }

    public function getSignature(): ?string
    {
        return $this->signature;
    }

    public function setSignature(?string $signature): self
    {
        $this->signature = $signature;

        return $this;
    }
}
