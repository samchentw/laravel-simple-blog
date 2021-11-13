<?php
namespace App\Repositories;

use App\Models\Comment;
use Samchentw\Common\Repositories\Base\Repository;

class CommentRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Comment::class;
    }

}