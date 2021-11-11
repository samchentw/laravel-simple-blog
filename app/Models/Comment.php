<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'post_id',  'body'
    ];


    public function getDiffTimeAttribute()
    {
        Carbon::setLocale("en");
        return Carbon::parse($this->created_at)->diffForHumans();
    }

    /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
