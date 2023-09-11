<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class TestThreeController extends MainController
{
    
    public function main(Request $request){
        $text = $request->text;
        $pattern = $request->pattern;
        return $this->respondSuccess([
            'Text' => $text,
            'Pattern' => $pattern,
            'Output' => $this->pattern_count($text, $pattern)]);
    }

    function pattern_count($text, $pattern) {
        $textLength = strlen($text);
        $patternLength = strlen($pattern);
        $count = 0;
    
        if($patternLength < 1) {
            return 0;
        }
    
        for ($i = 0; $i <= $textLength - $patternLength; $i++) {
            $substring = substr($text, $i, $patternLength);
    
            if ($substring === $pattern) {
                $count++;
            }
        }
    
        return $count;
    }

}