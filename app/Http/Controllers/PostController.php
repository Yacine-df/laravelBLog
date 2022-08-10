<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index(){ 

        return view('posts.index', [
                                    'posts' => post::latest()->where('active', '=', true)->filter(
                                        request(['search','category','author'])
                                        )->paginate(3),
                                    'categories' => Category::all()
                                    ]);

    }
    public function show(post $post){

        return view('posts.show', [
                                    'post' => $post,
                                    'categories' => Category::all()
                                  ]);
        
    }
    public function create(){

        return view('posts.create');

    }
    public function store(){
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')],
            'thumbnail' => 'required | image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['active'] = false;
        post::create($attributes);

        return redirect('/')->with('success', 'Post has been created successfully Admin Will Aprouve it soon');
    }
    //edit Post view
    public function edit(post $post){
        return view('posts.edit', ['post' => $post]);
    }
    //UPdate post
    public function update(post $post){
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts','slug')->ignore($post->id)],
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        if(isset($attributes['thumbnail'])){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        $post->update($attributes);
        return back()->with('success', 'Post Updated');
    }
    //Activate a post
    public function active(post $post){
        $post->update(['active' => true]);
        return back()->with('success','Post activated');
    }
    //Inactivate a post
    public function inactive(post $post){
        $post->update(['active' => false]);
        return back()->with('success','Post Inactivated');
    }
    public function delete(post $post){
        $post->delete();
        return back()->with('success','Post has been deleted');
    }
}
