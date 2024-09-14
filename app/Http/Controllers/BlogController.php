<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $blogs = Blog::with('category', 'tags')->get();
        return view('blogs.index', compact('blogs'));
    }

    public function create() {
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs.create', compact('categories', 'tags'));
    }

    public function store(Request $request) {
        $blog = Blog::create($request->only('title', 'content', 'category_id'));
        $blog->tags()->attach($request->tags);
        return redirect()->route('blogs.index');
    }

    public function edit($id) {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('blogs.edit', compact('blog', 'categories', 'tags'));
    }

    public function update(Request $request, $id) {
        $blog = Blog::findOrFail($id);
        $blog->update($request->only('title', 'content', 'category_id'));
        $blog->tags()->sync($request->tags);
        return redirect()->route('blogs.index');
    }

    public function destroy($id) {
        $blog = Blog::findOrFail($id);
        $blog->delete();
        return redirect()->route('blogs.index');
    }
    public function show($id)
{
    $blog = Blog::with('comments.replies')->findOrFail($id);
    return view('blogs.show', compact('blog'));
}

}
