<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Admin;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class BlogController extends Controller
{
    public function __construct(){

        // $this->middleware('authCheck2')->only(['create','show']);
        // $this->middleware('authCheck2')->except('index');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $posts=Admin::all();
        return view('admin',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories=Category::all();
        return view('adminCreate',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' =>['required','max:2028','image'],
            'title'=>['required','max:255'],
            'category_id'=>['required'],
            'description' => ['required']
        ]);
        $filename=time().'_'.$request->image->getClientOriginalName();
        $filePath= $request->image->storeAs('uploads',$filename);
        
        $post = new Admin();
        $post->title =$request->title;
        $post->description=$request->description;
        $post->category_id =$request->category_id;
        $post->image =$filePath;
        $post->deleted_at =date('d-m-y');
        $post->save();
        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Admin::findOrFail($id);
        $categories=Category::all();
        return view('adminEdit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>['required','max:255'],
            'category_id'=>['required'],
            'description' => ['required']
        ]);
        $post = Admin::findOrFail($id);
        if($request->hasFile('image')){
            $request->validate([
                'image' =>['required','max:2028','image'],
            ]);
            $filename=time().'_'.$request->image->getClientOriginalName();
            $filePath= $request->image->storeAs('uploads',$filename);
            File::delete(public_path('storage/'.$post->image));
            $post->image=$filePath;
          }
        $post->title=$request->title;
        $post->category_id = $request->category_id;
        $post->description= $request->description;
        $post->save();
        return redirect()->route('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $post= Admin::findOrFail($id);
       $post->delete();
       return redirect()->route('admin.index');
    }
}

