<?php

namespace App\Contracts\EloquentsDbRepository;

use App\Contracts\IDbRepository;


interface IPostDbRepository extends IDbRepository
{
    public function saveCategories(array $categoryIds, int $postId);

    public function saveTags(array $tagIds, int $postId);

    public function cloneTag(int $postId,int $id);

    public function cloneCategory(int $postId,int $id);
    
    public function clone(int $id);
    
    // public function joinCategory(string $query);
}
