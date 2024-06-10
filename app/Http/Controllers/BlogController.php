<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //

    public function index()
    {
        // Retrieve and display a list of blogs

        $blogs = Blog::all();

        //dd($blogs);
        return view('frontend.blogs.index', compact('blogs'));
    }

    public function create()
    {
        // Show the create blog form
        return view('frontend.blogs.create');
    }

    public function store(Request $request)
    {
        // Get the ID of the authenticated user
        $userId = auth()->user()->id;

        // Validate and store a new blog post
        $validatedData = $request->validate([
            'title' => 'required',
            'text' => 'required',
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust file types and size as needed
            'vdo_link' => 'nullable',

        ]);

        // Include the user_id in the validated data
        $validatedData['user_id'] = $userId;

        // Handle image upload
        if ($request->hasFile('blog_image')) {
            $imagePath = $request->file('blog_image')->store('blog_images', 'public');
            $validatedData['blog_image'] = $imagePath;
        }

        Blog::create($validatedData);

        return redirect()->route('blogs.index')->with('message', 'Blog post created successfully.');
    }

    public function show(Blog $blog)
    {
        return view('frontend.blogs.show', compact('blog'));
    }

    public function myBlogs()
    {
        // Get the currently authenticated user
        $user = auth()->user();
    
        // Retrieve and display the blogs written by the authenticated user
        $blogs = Blog::where('user_id', $user->id)->get();
    
        return view('frontend.blogs.my-blogs', compact('blogs'));
    }

    public function destroy(Blog $blog)
    {
        // Delete the specified blog post
        $blog->delete();

        return redirect()->route('blogs.my')->with('message', 'Blog post deleted successfully.');
    }
    

}
