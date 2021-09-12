<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Samchentw\Common\Traits\Supports\HasEnable;
use Samchentw\Common\Traits\Supports\HasSort;

/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $display_name
 * @property bool $enable
 * @property int $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category enableFalseQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category enableQuery(bool $enable)
 * @method static \Illuminate\Database\Eloquent\Builder|Category enableTrueQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortByConfig()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortOrderBy()
 * @method static \Illuminate\Database\Eloquent\Builder|Category sortOrderByDesc()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDisplayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
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
