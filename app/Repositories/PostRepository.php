<?php

namespace App\Repositories;

use App\Models\Post;
use Samchentw\Common\Repositories\Base\Repository;
use Illuminate\Database\Eloquent\Builder;

class PostRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Post::class;
    }

    public function getPostByIdWithRelation($id)
    {
        return Post::with(['tags', 'category', 'user', 'comments.user'])
            ->whereId($id)->first();
    }

    public function getPostPage()
    {
        return $this->getModel()->with(['tags', 'category', 'user'])
            ->orderBy('created_at', 'desc')->paginate(5);
    }

    public function getPostPageByTagId($tagId)
    {
        return $this->getModel()->with(['tags', 'category', 'user'])
            ->whereHas('tags', function (Builder $query) use ($tagId) {
                $query->where('tag_id', $tagId);
            })
            ->orderBy('created_at', 'desc')->paginate(5);
    }
}
