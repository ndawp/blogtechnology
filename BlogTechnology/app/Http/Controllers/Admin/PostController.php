<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\post;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = post::all();
        return view('admin.post.show',compact('posts'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->can('posts.create')) {
           $tags =tag::all();
            $categories =category::all();
            return view('admin.post.post',compact('tags','categories'));
        }
        return redirect(route('admin.home'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            'image' => 'required',
            ]);
        $post = new post;
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->hot = $request->hot;
        if($request->hasFile('image')){
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4).'_'.$file_name;
                while(file_exists('upload/posts/'.$random_file_name)){
                    $random_file_name = str_random(4).'_'.$file_name;
                }
                $file->move('upload/posts',$random_file_name);
                $post->image = 'upload/posts/'.$random_file_name;
            } else $post->image='';
        $post->save();
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->can('posts.update')) {
            $post = post::with('tags','categories')->where('id',$id)->first();
            $tags = tag::all();
            $categories =category::all();
            return view('admin.post.edit',compact('tags','categories','post'));
        }
        return redirect(route('admin.home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required',
            'subtitle' => 'required',
            'slug' => 'required',
            'body' => 'required',
            
            ]);
        
        $post = post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->status = $request->status;
        $post->hot = $request->hot;
        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);
        if($request->hasFile('image')){
                $file = $request->file('image');
                $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
                $file_name = $file->getClientOriginalName();
                $random_file_name = str_random(4).'_'.$file_name;
                while(file_exists('upload/posts/'.$random_file_name)){
                    $random_file_name = str_random(4).'_'.$file_name;
                }
                $file->move('upload/posts',$random_file_name);
                $post->image = 'upload/posts/'.$random_file_name;
            } else $post->image='';
        $post->save();

        return redirect(route('post.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return redirect()->back();
    }
}
