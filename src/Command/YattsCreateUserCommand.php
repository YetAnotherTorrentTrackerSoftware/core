<?php declare(strict_types=1);

namespace App\Command;

use App\Entity\Basic\User as BasicUser;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class YattsCreateUserCommand extends Command
{
    private UserPasswordEncoderInterface $passwordEncoder;

    private EntityManagerInterface $entityManager;

    private ValidatorInterface $validator;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder, EntityManagerInterface $entityManager, ValidatorInterface $validator)
    {
        parent::__construct('yatts:create-user');
        $this->passwordEncoder = $passwordEncoder;
        $this->entityManager = $entityManager;
        $this->validator = $validator;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $basicUser = (new BasicUser())
            ->setUsername($io->ask('Username'))
            ->setEmail($io->ask('Email'))
        ;

        $basicUser->setPassword($this->passwordEncoder->encodePassword($basicUser,
            $io->askHidden('Password')
        ));

        $violationList = $this->validator->validate($basicUser);
        if (0 !== count($violationList)) {
            /** @var ConstraintViolationInterface $violation */
            foreach ($violationList as $violation) {
                $io->error($violation->getMessage());
            }

            return 1;
        }

        $this->entityManager->persist($basicUser);
        $this->entityManager->flush();

        return 0;
    }
}
