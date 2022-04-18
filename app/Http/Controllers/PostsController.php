<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(8);
        // if (!$posts->img) {
        //     $posts->img = "images.jpg";
        // }

        return view('pages.index', compact('posts'));
        //  return view('pages.index');

    }
    public function add()
    {
        return view('pages.add');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        $posts = Post::paginate(8);
        return redirect()->route("pages.index")->with('message', "posts Has been deleted");

        // if ($post->delete()) {

        //     
        //     return view('pages.index', compact('posts'));
        // }
    }

    // update function
    public function edit(Request $request, $id)
    {
        // dd($request->all());

        $data = $request->validate([
            'name' => 'required|string|max:150',
            'content' => 'required|string|max:150000',

            // 'img' => 'required|image|mimes:png,jpg,gif',
        ]);

        $post = Post::find($id);
        $post->name = $data['name'];
        $post->content = $data['content'];
        // $post->img = $data['img'];
        if ($post->save()) {

            $posts = Post::paginate(8);
            return redirect()->route("pages.index")->with('message', "post Has been updated");
        }
    }
    // edit function 
    public function editindex($id)
    {
        $post = Post::find($id);
        //  dd($page);
        // return view('pages.edit')->with('page');
        // dd($id);
        // dd($page);
        return view('pages.edit', compact('post'));
    }

    // store
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:150',
            'content' => 'required|string|max:150000',
            'img' => 'required|image|mimes:png,jpg,gif',

        ]);
        if ($request->hasFile('img')) {
            $filename = $request->img->getClientOriginalName();
            // $request->img->storeAs('posts', $filename, 'public');
            $request->img->move(public_path('images'), $filename);
            $data['img'] = $filename;
        }

        Post::create($data);
        return redirect()->route('pages.index');
    }
}
