<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    protected $validationRoule = [
        'title' => 'required|min:3',
        'description' => 'required|min:5',
        'image_url' => 'image|max:255|mimes:jpeg,jpg,png',
        'category_id' => 'nullable|exists:categories,id',
        'tag' => 'nullable|exists:tags,id',

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::WHERE('user_id', Auth::id())->get();
        return view('admin.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categoris = Category::all();
        $post = new Post();
        $route = route('admin.post.store');
        $method = 'POST';
        return view('admin.post.create&edit', compact(['post', 'route', 'method', 'categoris', 'tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validationData = $request->validate($this->validationRoule);
        $data = $request->all();
        $newPost = new Post();
        $data['user_id'] = Auth::id();
        $data['sale_date'] = new DateTime();
        $data['image_url'] = Storage::put('uploads', $data['image_url']);
        $newPost->fill($data);
        $newPost->save();
        if (array_key_exists('tag', $data)) {
            $newPost->tags()->sync($data['tag']);
        }

        return redirect()->route('admin.post.index')->with('create', $data['title']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categoris = Category::all();
        $post = Post::findOrFail($id);
        $route = route('admin.post.update', $post->id);
        $method = 'PUT';
        return view('admin.post.create&edit', compact(['post', 'route', 'method', 'categoris', 'tags']));
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
        $validationData = $request->validate($this->validationRoule);
        $post = Post::findOrFail($id);
        $data['user_id'] = Auth::id();
        $data['sale_date'] = $post->sale_date;
        $data = $request->all();
        $data['image_url'] = Storage::put('uploads', $data['image_url']);
        $post->fill($data);
        $post->save();
        if (array_key_exists('tag', $data)) {
            $post->tags()->sync($data['tag']);
        } else {
            $post->tags()->detach($post->tag);
        }
        return redirect()->route('admin.post.index')->with('create', $data['title']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->tags()->detach($post->tag);
        $post->delete();
        return redirect()->route('admin.post.index')->with('delete', $post->title);
    }

    /**
     * remove Category from on post
     *
     * @param  mixed $id
     * @return void
     */
    public function removeCategoryFromPost($id)
    {
        $post = Post::findOrFail($id);
        $category_id = $post->category_id;
        $post->category_id = null;
        $post->save();
        return redirect()->route('admin.category.show', $category_id);
    }
}
