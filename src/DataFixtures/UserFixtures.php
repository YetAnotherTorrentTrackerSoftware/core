<?php declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Basic\User as BasicUser;
use App\Entity\Forum\User as ForumUser;
use App\Entity\Tracker\User as TrackerUser;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private UserPasswordEncoderInterface $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = (new BasicUser())
            ->setUsername('demo')
            ->setEmail('demo@example.com')
        ;

        $user->setPassword($this->passwordEncoder->encodePassword(
            $user,
            $user->getUsername()
        ));

        $manager->persist($user);

        $forumUser = (new ForumUser($user));
        $manager->persist($forumUser);

        $trackerUser = (new TrackerUser($user));
        $manager->persist($trackerUser);

        $manager->flush();
    }
}
