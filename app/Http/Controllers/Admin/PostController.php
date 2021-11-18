<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{


    protected $validationRules=[
        'title'=>'required|min:4|max:40',
        'slug'=>'nullable|max:40',
        'content'=>'required|min:10',
        'category_id'=>'nullable|exists:categories,id',
        'tags'=>'exists:tags,id'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories= Category::all();
        $tags= Tag::all();
        return view('admin.posts.create',compact("categories","tags"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate($this->validationRules);
        $newPost= new Post();
        $newPost->fill($request->all());
        $newPost->slug = $this->isSlugPresent($request->title);
        $newPost->save();

        $newPost->tags()->attach($request->tags);
        return redirect()->route('admin.posts.index')->with('success',"Il post '{$newPost['title']}' è stato creato");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {   
        $categories= Category::all();

        return view('admin.posts.edit', compact("post","categories"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {   
        $request->validate($this->validationRules);
        $data=$request->all();
        $data['slug'] = $this->isSlugPresent($request->title);
        $post->update($data);
        return redirect()->route('admin.posts.show',compact('post'))->with('success',"Il post '{$post['title']}' è stato aggiornato");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index')->with('success',"Il post {$post['id']} è stato eliminato");
    }
    private function isSlugPresent($title){
        
        $slug=Str::of($title)->slug('-');
        $postExists= Post::where("slug", $slug)->first();
        $count=2;
        while($postExists){
            $slug=Str::of($title)->slug('-')."-{$count}";
            $postExists= Post::where("slug", $slug)->first();            
            $count++;
        }
        return $slug;
    }
}
