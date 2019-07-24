<?php

namespace App\Repositories;

use App\Contracts\IMediaRepository;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;



class MediaRepository implements IMediaRepository{

    public function fix(array $fileimgfix,string $filename){
        foreach ($fileimgfix as $width=>$height) {
            $imgFix = Image::make('storage/img/'.$filename);
            $newPathFix = public_path('storage/img/fix-'.$width.'x'.$height.'-'.$filename);
            $imgFix->fit($width,$height);
            $imgFix->save($newPathFix);
        }
    }

    public function deleteFileOld(array $fileImgFix,$fileImg){
        foreach ($fileImgFix as $width=>$height) {
            $fileNameFix = str_replace('img/','fix-'.$width.'x'.$height.'-',$fileImg);
            $filePathOld = public_path('storage/img/'.$fileNameFix);
            if(file_exists($filePathOld)){
                unlink($filePathOld);
            }
        }
    }

}