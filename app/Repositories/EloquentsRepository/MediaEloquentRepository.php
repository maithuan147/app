<?php

namespace App\Repositories\EloquentsRepository;

use App\Repositories\EloquentRepository;
use App\Contracts\EloquentsDbRepository\IMediaDbRepository;
use App\ImageSize;


class MediaEloquentRepository extends EloquentRepository implements IMediaDbRepository
{
    public function __construct()
    {
        $this->setModel();
    }
    public function getModel()
    {
        return ImageSize::class;
    }
}