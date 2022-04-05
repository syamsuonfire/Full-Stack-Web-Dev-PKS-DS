<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use UsesUuid;

    protected $fillable = ['content','post_id'];
}
