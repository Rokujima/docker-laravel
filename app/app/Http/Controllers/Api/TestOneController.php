<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class TestOneController extends MainController
{
    
    public function main(Request $request){
        $array = json_decode($request->array);
        $char = $request->findChar;
        return $this->respondSuccess([
            'input' => $request->array, 
            'find' => $char,
            'output' =>$this->multiple_chars($array, $char)]);
    }

    function multiple_chars($array, $chars, $count = 1){
        $sum = [];
        $char = str_split($chars);
        foreach($char as $item){
            $sum[$item] = $this->array_depth($array, $item) * $count;
            $count++;
        }
    
        return array_sum($sum);
    }

    function array_depth($array, $char, $depth = 1) {
        $sum = 0; 
        foreach ($array as $item) {
            if (is_array($item)) {
                $sum += $this->array_depth($item, $char, $depth + 1); 
            } elseif (str_contains($item, $char)) {
                $sum += $depth;
            }
        }
        return $sum;
    }

}