<?php

namespace App\Contracts;


interface IMediaRepository{
    
    public function fix(array $fileimgfix,string $filename);

    public function deleteFileOld(array $fileImgFix,$fileImg);
}