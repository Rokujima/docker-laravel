<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class TestTwoController extends MainController
{
    
    public function main(Request $request){
        $html = $request->input;

        $array = $this->extract_scheme_names($html);
        return $this->respondSuccess($this->attribute_to_find($html, $array));
    }

    function extract_scheme_names($html) {
        $pattern = '/\s+sc-([\w-]+)/';
        preg_match_all($pattern, $html, $matches);
        
        return array_unique(end($matches));
    }

    function attribute_to_find($html, $array){
        $result = [];
        foreach($array as $attribute){
            $pattern = "/{$attribute}=\"([^\"]*)\"/i";
            if (preg_match($pattern, $html, $matches)) {
                $result[$attribute] = end($matches);
            } else {
                $result[$attribute] = "";
            }
        }
        return $result;
    }

}