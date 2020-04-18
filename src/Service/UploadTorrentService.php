<?php declare(strict_types=1);

namespace App\Service;

use League\Flysystem\FilesystemInterface;
use Rych\Bencode\Bencode;
use Symfony\Component\HttpFoundation\Request;

class UploadTorrentService
{

    private FilesystemInterface $defaultStorage;

    public function __construct(FilesystemInterface $defaultStorage)
    {
        $this->defaultStorage = $defaultStorage;
    }

    public function handleRequest(Request $request)
    {
        $data = Bencode::decode('');


    }
}
