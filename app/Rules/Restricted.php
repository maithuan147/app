<?php

namespace App\Rules;

use App\Restricted as Restricteds;
use Illuminate\Contracts\Validation\Rule;

class Restricted implements Rule
{
    protected $restrictedString;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $restrictedWords = Restricteds::all()->pluck('words')->toArray();
        foreach($restrictedWords as $key=>$restrictedWord){
            if (stristr($value, $restrictedWord)){
                $restricted = $restrictedWord;
                $restrictedArray[$key] = $restricted;
                $this->restrictedString = implode(',',$restrictedArray);
            } 
        }
        return str_ireplace($restrictedWords,'',$value) === $value;            
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Nội dung có chứa từ cấm '.$this->restrictedString;
    }
}
