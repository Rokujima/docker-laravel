<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Documents;
use App\Models\Product;


class MiniProjectController extends MainController
{
    public function main(Request $request){

    }

    public function show()
    {

      $post = new Product;

       $post->title = 'a';
       $post->body = 'b';
       $post->slug = 'c';

       $post->save();

        // return view('post', [
        //     'post' => Product::first()
        // ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
                'filenames' => 'required',
                'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpge,jpg'
        ]);
        if($request->hasfile('filenames'))
         {
            foreach($request->file('filenames') as $file)
            {
                $name = time().'.'.$file->extension();
                $file->move(base_path() . '/storage/app/public', $name);
                $data[] = $name;
            }
         }


         $file= new File();
         $file->filenames=json_encode($data);
         $file->save();


        return back()->with('success', 'Your files has been send successfully');
    }
}