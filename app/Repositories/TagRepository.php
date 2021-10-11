<?php

namespace App\Repositories;

use App\Models\Tag;
use Samchentw\Common\Repositories\Base\Repository;

class TagRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Tag::class;
    }


    public function getTagsByName(array $names)
    {
        return Tag::whereIn('name', $names)->get();
    }
}
