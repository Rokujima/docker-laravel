<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Product;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportProduct;


class MiniProjectController extends MainController
{

    public function import(Request $request){

        $this->validate($request, [
            'file' => 'required',
            'file.*' => 'mimes:xls,csv,'
        ]);

        if($request->hasfile('file'))
         {
            $doc = new Document();
            $doc->filename = $request->file('file')->getClientOriginalName();
            $doc->date = new \DateTime();
            $doc->save();
         }

        Excel::import(new ImportProduct,
                      $request->file('file')->store('files'));

        return redirect()->back();
    }

    public function history(Request $request){
        return $this->respondSuccess(Document::get());
    }

    public function product(Request $request){
        return $this->respondSuccess(Product::get());
    }
}