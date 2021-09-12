<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Samchentw\Common\Traits\Supports\HasEnable;
use Samchentw\Common\Traits\Supports\HasSort;

/**
 * App\Models\Category
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Category enableFalseQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category enableQuery(bool $enable)
 * @method static \Illuminate\Database\Eloquent\Builder|Category enableTrueQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortByConfig()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortOrderBy()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortOrderByDesc()
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasFactory,
        HasSort,
        HasEnable;

    protected $fillable = [
        'display_name'
    ];
}
