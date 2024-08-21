<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function create()
    {
        return view('create_post');
    }
    public function store(Request $request)
    {
    
        $request->validate([
            'comicTitle' => 'required|string|max:255',
            'comicImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'comicmDescription' => 'required|string|max:255',
            'comicDescription' => 'required|string',
        ]);

    
        if ($request->hasFile('comicImage')) {
            $image = $request->file('comicImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

        
            Post::create([
                'title' => $request->input('comicTitle'),
                'mini_description' => $request->input('comicmDescription'),
                'description' => $request->input('comicDescription'),
                'image_path' => 'images/' . $imageName,
            ]);

            return redirect('/')->with('success', 'Post created successfully!');
        }

        return back()->withErrors('Image upload failed!');
    }
    public function show($id)
    {
        $post = Post::findOrFail($id); 
        return view('post', compact('post')); 
    }

}
