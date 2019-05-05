<?php

namespace App\Repositories\Post;

use Illuminate\Support\Facades\DB;

class PostRepository implements PostRepositoryInterface
{
    /**
     * Get all post
    */
    public function all()
    {
        $posts = DB::table('posts')
            ->select('title', 'excerpt', 'published_at', 'thumbnail')
            ->orderBy('created_at', 'desc')
            ->get();
        return $posts;
    }

    /**
     * Find post by id
    */
    public function find($id)
    {
        $posts = DB::table('posts')
            ->select()
            ->where('id', $id)
            ->get();
        return $posts;
    }
}
