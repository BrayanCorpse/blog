<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Category;
use App\Tag;
use App\Post_tag;
use App\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function index()
    {

        $posts = Post::all();
        return view('admin.posts.index',compact('posts'));
        //->with('posts',$posts);
    }

    public function create()
    {

       $nextpost = Post::orderBy('id','desc')
        ->take(1)
        ->get();
        if (count($nextpost)==0)
        {
        $idnp = 1;
        }
        else
        {
        $idnp= $nextpost[0]->id+1;
        }

      //  $post ="nuevo-post";

        $date = Carbon::now();
      
        $categories = Category::all();

        $tags =Tag::all();
    
        return view('admin.posts.create',compact('categories','tags','date','idnp'));

    }

    public function store(Request $request)
    {


        $this->validate($request,[
            'título'=>'required',
            'contenido'=>'required',
            'category'=>'required',
            'extracto'=>'required',
            'tags'=>'required',
           
            
        ]);

        
       // return $request->all();
       // return Post::create($request->all());

       $post = new Post;
       $post->title = $request->título;
       $post->url = str_slug($request->título);
       $post->body = $request->contenido;
       $post->excerpt = $request->extracto;
       $post->published_at = Carbon::parse($request->published_at);
       $post->category_id = $request->category;
       $post->save();

       $post->tags()->attach($request->get('tags'));

       $file = $request->file('Archivo');
        if($file!=""){
        //ldate  => 20180928_063455_
        $ldate = date('Ymd_His_');
        //$img = normita-jpg
        $img = $file->getClientOriginalName();
        // img
        $img2 = $ldate.$img;
        //imagen predefinida para el cliente
        \Storage::disk('local')->put($img2, \File::get($file));
        }
  
      else{
        $img2 = 'sinfoto.jpg';
      }


       $photo = new Photo;
       $photo->post_id = $request->idnp;
       $photo->url = $img2;
       $photo->save();

       return back()->with('flash', 'Tu publicación ha sido creada');


    }

    public function store2(Request $request)
    {
        $this->validate($request,['título' => 'required']);

        $post = $request->get('título');
    
        return redirect()->route('admin.posts.edit',$post);
    }

    public function edit(Post $post)
    {
        $date = Carbon::now();
      
        $categories = Category::all();

        $tags =Tag::all();

        return view('admin.posts.edit', compact('categories','tags','date','post'));
    }

    public function update(Post $post, Request $request){

        $this->validate($request,[
            'título'=>'required',
            'contenido'=>'required',
            'category'=>'required',
            'extracto'=>'required',
            'tags'=>'required'
            
        ]);
       // return $request->all();
       // return Post::create($request->all());

      
       $post->title = $request->título;
       $post->url = str_slug($request->título);
       $post->body = $request->contenido;
       $post->iframe = $request->iframe;
       $post->excerpt = $request->extracto;
       $post->published_at = Carbon::parse($request->published_at);
       $post->category_id = $request->category;
       $post->save();

       $post->tags()->sync($request->get('tags'));

       return redirect()->route('admin.posts.edit', $post)->with('flash', 'Tu publicación ha sido guardada');


    }
}
