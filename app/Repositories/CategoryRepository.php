<?php
namespace App\Repositories;

use App\Models\Category;
use Samchentw\Common\Repositories\Base\Repository;

class CategoryRepository extends Repository
{

    /**
     * @return string
     */
    public function model(): string
    {
        return Category::class;
    }

}