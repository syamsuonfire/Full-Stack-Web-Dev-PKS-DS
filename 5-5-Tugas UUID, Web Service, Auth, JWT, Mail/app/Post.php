<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use UsesUuid;

    protected $fillable = ['title','description','user_id'];

    public function user() {
        return $this->belongsTo('App\User');
    }
}
