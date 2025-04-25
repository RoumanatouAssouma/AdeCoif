<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BlogPost; 
use App\Http\Controllers\Controller;
// Modèle à créer pour les blogs

class AdminBlogController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::all(); // Récupère tous les articles de blog
        return view('admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blog.create');
    }

    public function store(Request $request)
    {
        BlogPost::create($request->all());
        return redirect()->route('admin.blog.index');
    }

    public function edit($id)
    {
        $blog = BlogPost::findOrFail($id);
        return view('admin.blog.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = BlogPost::findOrFail($id);
        $blog->update($request->all());
        return redirect()->route('admin.blog.index');
    }

    public function destroy($id)
    {
        BlogPost::destroy($id);
        return redirect()->route('admin.blog.index');
    }
}

