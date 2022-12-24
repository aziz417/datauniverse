<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class BlogController extends Controller
{
    public function featuredBlogs()
    {
        $featured_posts = Post::with('image')->feature()->status()->latest()->get();
        return response()->json([
            'data' => $featured_posts
        ], 200);
    }

    public function latestBlogs()
    {
        $latestBlogs = Post::with('image')->status()->latest()->paginate(10);
        return response()->json([
            'data' => $latestBlogs
        ], 200);
    }

    public function popularBlogs()
    {
        $popular_posts = Post::with('image')->status()->latest()->orderBy('view', 'desc')->get();
        return response()->json([
            'data' => $popular_posts
        ], 200);
    }


    public function show($post)
    {
        $post = Post::with('image', 'categories', 'categories.posts', 'tags', 'tags.posts')->where('slug', $post)->first();

        $category_posts = $post->categories()->with('posts', 'posts.image')->get()->pluck('posts');
        $tags_posts = $post->tags()->with('posts', 'posts.image')->get()->pluck('posts');
        $post_merge = $category_posts->merge($tags_posts);
        $full_arr_of_posts = Arr::collapse($post_merge);
        $related_posts = collect($full_arr_of_posts)->unique('title')->take(10);

        return response()->json([
            'data' => $post,
            'related_blogs' => $related_posts
        ]);
    }

    public function tagBlogs($tag)
    {
        $featured_posts = [];
        $tag = Tag::where('slug', $tag)->first();
        $latestBlogs = $tag->posts()->with('image')->status()->paginate(20);
        $popular_posts = Post::with('image')->status()->latest()->orderBy('view', 'desc')->get();
        $wise_name = $tag->name;

        return response()->json([
            'data' => [
                'featured_blogs' => $featured_posts,
                'latest_blogs' => $latestBlogs,
                'popular_blogs' => $popular_posts,
            ]
        ], 200);
    }

    public function categoryBlogs($category)
    {
        $featured_posts = [];
        $category = Category::where('slug', $category)->first();
        $latestBlogs = $category->posts()->with('image')->status()->paginate(20);
        $popular_posts = Post::with('image')->status()->latest()->orderBy('view', 'desc')->get();
        $wise_name = $category->name;

        return response()->json([
            'data' => [
                'featured_blogs' => $featured_posts,
                'latest_blogs' => $latestBlogs,
                'popular_blogs' => $popular_posts,
            ]
        ], 200);
    }

}
