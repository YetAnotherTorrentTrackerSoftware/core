<?php declare(strict_types=1);

namespace App\Entity\Tracker;

use App\Entity\Basic\Torrent as BasicTorrent;
use App\Entity\Basic\User as BasicUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\Tracker\BookmarkRepository")
 * @ORM\Table(name="tracker_bookmark")
 */
class Bookmark
{
    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\User")
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicUser $user;

    /**
     * @ORM\Id()
     * @ORM\ManyToOne(targetEntity="App\Entity\Basic\Torrent")
     * @ORM\JoinColumn(nullable=false)
     */
    private BasicTorrent $torrent;

    public function __construct(BasicUser $user, BasicTorrent $torrent)
    {
        $this->user = $user;
        $this->torrent = $torrent;
    }

    public function getUser(): BasicUser
    {
        return $this->user;
    }

    public function getTorrent(): BasicTorrent
    {
        return $this->torrent;
    }
}
