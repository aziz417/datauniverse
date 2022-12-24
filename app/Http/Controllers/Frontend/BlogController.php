<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $featured_posts = Post::with('image')->feature()->status()->latest()->get();
        $latestBlogs = Post::with('image')->status()->latest()->paginate(10);
        $popular_posts = Post::with('image')->status()->latest()->orderBy('view', 'desc')->paginate(5);

        return view('pages.blog.index', compact('categories', 'featured_posts', 'latestBlogs', 'popular_posts'));
    }

    public function show($post)
    {
        $post = Post::with('image', 'categories', 'tags')->where('slug', $post)->first();


        // post view count
        $blogKey = "blog_" . $post->id;
        if (!Session::has($blogKey)) {
            $post->increment('view');
            Session::put($blogKey, 1);
        }

        $category_posts = $post->categories()->with('posts', 'posts.image')->get()->pluck('posts');
        $tags_posts = $post->tags()->with('posts', 'posts.image')->get()->pluck('posts');
        $post_merge = $category_posts->merge($tags_posts);
        $full_arr_of_posts = Arr::collapse($post_merge);
        $related_posts = collect($full_arr_of_posts)->unique('title')->take(10);
        return view('pages.blog.show', compact('post', 'related_posts'));
    }

    public function tagBlogs($tag)
    {
        $featured_posts = [];
        $tag = Tag::where('slug', $tag)->first();
        $latestBlogs = $tag->posts()->with('image')->status()->paginate(20);
        $popular_posts = Post::with('image')->status()->latest()->orderBy('view', 'desc')->paginate(10);
        $wise_name = $tag->name;
        return view('pages.blog.index', compact('latestBlogs', 'popular_posts', 'wise_name', 'featured_posts'));
    }

    public function categoryBlogs($category)
    {
        $featured_posts = [];
        $category = Category::where('slug', $category)->first();
        $latestBlogs = $category->posts()->with('image')->status()->paginate(20);
        $popular_posts = Post::with('image')->status()->latest()->orderBy('view', 'desc')->paginate(10);
        $wise_name = $category->name;
        return view('pages.blog.index', compact('latestBlogs', 'popular_posts', 'wise_name', 'featured_posts'));
    }
}
