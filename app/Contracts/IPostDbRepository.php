<?php

namespace App\Contracts;

use App\Contracts\IDbRepository;


interface IPostDbRepository extends IDbRepository
{
    public function Categories(array $categoryIds, int $postId);

    public function Tags(array $tagIds, int $postId);
}
