<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    //this is a class contains a method
   /* public function test1(){
        return view('login');
    }
    public function getData(Request $req){
        return $req->input();
    }*/
    public function showupload(){
        return view('upload');
    }

    public function upload(request $request){
        $file_extension = $request->image->getClientOriginalExtension();
        $file_name = time() . '.'. $file_extension;
        $path ='assets/images';
        $request->image->move($path, $file_name);
        return'uploaded';
    }

    public function place(){
    return view ('place');
}

public function blog(){
    return view ('blog');
}

}