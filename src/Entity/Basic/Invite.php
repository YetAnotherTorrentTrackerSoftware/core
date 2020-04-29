<?php declare(strict_types=1);

namespace App\Entity\Basic;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Basic\InviteRepository")
 * @ORM\Table(name="invite")
 */
class Invite
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="uuid")
     */
    private UuidInterface $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\User")
     */
    private User $inviter;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $token;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Basic\User")
     * @ORM\JoinColumn(nullable=true)
     */
    private User $invitee;

    public function __construct(string $token)
    {
        $this->id = Uuid::uuid4();
        $this->token = $token;
    }

    public function getId(): UuidInterface
    {
        return $this->id;
    }

    public function getInviter(): User
    {
        return $this->inviter;
    }

    public function setInviter(User $inviter): self
    {
        $this->inviter = $inviter;

        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getInvitee(): User
    {
        return $this->invitee;
    }

    public function setInvitee(User $invitee): self
    {
        $this->invitee = $invitee;

        return $this;
    }
}
