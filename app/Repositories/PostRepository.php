<?php

namespace App\Repositories;

use App\Models\Post;
use Samchentw\Common\Repositories\Base\Repository;

class PostRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Post::class;
    }

    public function getPostByIdWithSlug($id, $slug)
    {
        return Post::with(['tags', 'category', 'user'])
            ->whereId($id)->whereSlug($slug)->first();
    }

    public function getPostPage()
    {
        return $this->getModel()->with(['tags', 'category', 'user'])
            ->orderBy('created_at', 'desc')->paginate(5);
    }
}
