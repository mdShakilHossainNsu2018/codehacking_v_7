<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminPostsRequest;
use App\Post;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPostsRequest $request)
    {
        //

        $input = $request->all();

        $user = Auth::user();

        if ($file = $request->file('photo_path')){

            $name = time().$file->getClientOriginalName();


            $input['photo_path'] = $name;

            $file->move('images', $name);

        }

        $user->posts()->create($input);
        return redirect()->to('admin/posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $post = Post::findOrFail($id);

        $categories = Category::pluck('name', 'id')->all();

        return view('admin.posts.edit', compact('post', 'categories'));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPostsRequest $request, $id)
    {
        //


        $input = $request->all();

        $user = Auth::user();

        $post = Post::whereId($id)->first();

        if ($file = $request->file('photo_path')){

            unlink(public_path().$post->photo_path);

            $name = time().$file->getClientOriginalName();


            $input['photo_path'] = $name;

            $file->move('images', $name);

        }

        $post->update($input);
        return redirect()->to('admin/posts');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        unlink(public_path().$post->photo_path);
        $post->delete();

        return redirect()->to('admin/posts');


    }
}
