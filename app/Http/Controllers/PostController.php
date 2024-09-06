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

    // New method: View all posts (for the Manage Posts page)
    public function manage()
    {
        $posts = Post::all(); // Get all posts
        return view('manage_posts', compact('posts')); // Pass the posts to the manage_posts view
    }

    // New method: Edit post
    public function edit($id)
    {
        $post = Post::findOrFail($id); // Find the post by ID
        return view('edit_post', compact('post')); // Pass the post to the edit view
    }

    // New method: Update post
    public function update(Request $request, $id)
    {
        $request->validate([
            'comicTitle' => 'required|string|max:255',
            'comicmDescription' => 'required|string|max:255',
            'comicDescription' => 'required|string',
        ]);

        $post = Post::findOrFail($id); // Find the post by ID

        // Check if a new image was uploaded
        if ($request->hasFile('comicImage')) {
            $image = $request->file('comicImage');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $post->image_path = 'images/' . $imageName; // Update image path
        }

        // Update other fields
        $post->title = $request->input('comicTitle');
        $post->mini_description = $request->input('comicmDescription');
        $post->description = $request->input('comicDescription');
        $post->save(); // Save the updated post

        return redirect()->route('manage_posts')->with('success', 'Post updated successfully!');
    }

    // New method: Delete post
    public function destroy($id)
    {
        $post = Post::findOrFail($id); // Find the post by ID
        $post->delete(); // Delete the post

        return redirect()->route('manage_posts')->with('success', 'Post deleted successfully!');
    }
}
