<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Models\BlogCategory;

class BlogController extends Controller
{
    /**
     * Affiche la liste des articles de blog
     */
    public function index(Request $request)
    {
        $query = BlogPost::where('is_published', true)
                        ->whereNotNull('published_at');
        
        // Recherche
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }
        
        $posts = $query->orderBy('published_at', 'desc')
                      ->paginate(6);
        
        $categories = BlogCategory::withCount(['posts' => function($query) {
                                    $query->where('is_published', true)
                                          ->whereNotNull('published_at');
                                }])
                                ->get();
        
        $recentPosts = BlogPost::where('is_published', true)
                              ->whereNotNull('published_at')
                              ->orderBy('published_at', 'desc')
                              ->take(3)
                              ->get();
        
        return view('blog.index', compact('posts', 'categories', 'recentPosts'));
    }
    
    /**
     * Affiche un article de blog spécifique
     */
    public function show($slug)
    {
        $post = BlogPost::where('slug', $slug)
                       ->where('is_published', true)
                       ->whereNotNull('published_at')
                       ->firstOrFail();
        
        $relatedPosts = BlogPost::where('category_id', $post->category_id)
                               ->where('id', '!=', $post->id)
                               ->where('is_published', true)
                               ->whereNotNull('published_at')
                               ->orderBy('published_at', 'desc')
                               ->take(3)
                               ->get();
        
        return view('blog.show', compact('post', 'relatedPosts'));
    }
    
    /**
     * Affiche les articles d'une catégorie spécifique
     */
    public function category($slug)
    {
        $category = BlogCategory::where('slug', $slug)->firstOrFail();
        
        $posts = BlogPost::where('category_id', $category->id)
                        ->where('is_published', true)
                        ->whereNotNull('published_at')
                        ->orderBy('published_at', 'desc')
                        ->paginate(6);
        
        $categories = BlogCategory::withCount(['posts' => function($query) {
                                    $query->where('is_published', true)
                                          ->whereNotNull('published_at');
                                }])
                                ->get();
        
        $recentPosts = BlogPost::where('is_published', true)
                              ->whereNotNull('published_at')
                              ->orderBy('published_at', 'desc')
                              ->take(3)
                              ->get();
        
        return view('blog.index', compact('posts', 'categories', 'recentPosts', 'category'));
    }
}
