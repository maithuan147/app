<?php

namespace App\Models\Setting\RestrictedTraits;

use Illuminate\Support\Str;

trait Property{
    public function getId(){
        return $this->id;
    }
    public function getWords(){
        return $this->words;
    }
    public function getWordsArray(){
        $wordsArray = implode(',' ,$restritesArray);
        return $wordsArray;
    }
}