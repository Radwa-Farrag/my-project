<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\News;
use App\Traits\common;

class NewsController extends Controller
{
    use common;

    private $columns = ['title', 'content','writer','published' ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view("news");
        $news = News::get();
        return view('newstable',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*$news = new News;
        $news->title=$request->title;
        $news->content=$request->content ;
        $news->writer=$request->writer;
       if(isset($request->published)){
            $news->published=true;
        }else{
            $news->published=false;
        }
        $news->save();
        return "News Data Added Successfully";*/


       /* $data = $request->only($this->columns);
        $data['published']=isset($request['published'])? true:false;*/
        
        $message=[
            'title.required'=>'Title Is Required',
            'content.required'=>'There Is No Content',
            'writer.required'=>'Add Writer Please',
        ];
        $data = $request->validate([
            'title'=>'required|string|max:10',
            'content'=>'required|string|max:100',
            'writer'=>'required|string',
            'image'=>'required|mimes:png,jpg,jpeg|max:2048',
        ],$message);
        $filename = $this->uploadFile($request->image,'assets/images');
        $data['image']= $filename;
        $data['published']=isset($request['published'])? 1: 0;
        News::create($data);
        return redirect ('newstable');

        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $news = News::findOrFail($id);
        return view('newsdetails',compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $news = News::findOrFail($id);
        return view('updatenews',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    $data = $request->only($this->columns);
    $data['published']=isset($request['published'])? true:false;
    News::where('id', $id)->update($data);    
    return redirect('newstable');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        News::where('id', $id)->delete();
        return redirect('newstable');
    }

    //the code below is for force delete 👇
     public function x(string $id): RedirectResponse
    {
       News::where ('id',$id)->forceDelete();
       return redirect('trashednews');

    }

    public function trashed(){
        $news= News::onlyTrashed()->get();
        return view('trashednews',compact('news'));
    }

    public function restore(string $id): RedirectResponse
    {
        News::where('id', $id)->restore();
        return redirect('newstable');
    }

    public function upload(request $request)
    {
        //$file_extension = $request->image->getClientOriginalExtension();
        //$file_name = time() . '.'. $file_extension;
        //$path ='assets/images';
        //$request->image->move($path, $file_name);
        $y = $this->uploadFile($request->image,'assets/images');
        return $y;
    }
    
}
