<?php

namespace App\Http\Controllers\Admin;

use DB;
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
use App\Http\Requests\StorePostRequest;

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

        $date = Carbon::now();

        $date = $date->format('d-m-Y');
      
    
        return view('admin.posts.create',compact('date','idnp'));

    }

    public function store(Request $request)
    {


        $this->validate($request,[
            'título'=>'required'
        ]);

       $post = $request->idnp;

       $title = $request->título;

       $name = DB::table('posts')->where('title', $title)->exists();

       if($name != $title)
       {
        $post = new Post;
        $post->title = $request->título;
        $post->url = str_slug($request->título);
        $post->excerpt = NULL;
        $post->iframe = NULL;
        $post->body = NULL;
        $post->published_at = Carbon::parse($request->published_at);
        $post->category_id = NULL;
        $post->save();

    
       return redirect()->route('admin.posts.edit',$post);
       }

       else
       {
        return redirect()->back() ->with('alert', 'El Nombre de este Post ya Existe! ');
       }
        
     



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
        // $date = $date->format('d-m-Y');
      
        $categories = Category::all();

        $tags =Tag::all();

        return view('admin.posts.edit', compact('categories','tags','date','post'));
    }

    public function update(Post $post, StorePostRequest $request){

      
       $post->title = $request->título;
       $post->url = str_slug($request->título);
       $post->body = $request->contenido;
       $post->iframe = $request->iframe;
       $post->excerpt = $request->extracto;
       $post->published_at = $request->get('published_at');
       
       $post->category_id = Category::find($cat = $request->get('category'))
       ? $cat
       : Category::create(['name' => $cat])->id;
       $post->save();

       $post->tags()->sync($request->get('tags'));

      

       return redirect()->route('admin.posts.edit', $post)->with('flash', 'La publicación ha sido guardada');


    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();

        $post->photos()->delete();

        $post->delete();

        return redirect()->route('admin.posts.index')->with('flash', 'Tu publicación ha sido eliminada');
    }
}
