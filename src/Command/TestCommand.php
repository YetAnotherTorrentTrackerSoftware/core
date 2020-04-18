<?php declare(strict_types=1);

namespace App\Command;

use App\Entity\Basic\Torrent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class TestCommand extends Command
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct('test');

        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $t = new Torrent();
        $t->setName('test');
        $t->setInfoHash('1234');
        $t->setSize(0);

        $this->entityManager->persist($t);
        $this->entityManager->flush();

        $io->success($t->getId());

        return 0;
    }
}
