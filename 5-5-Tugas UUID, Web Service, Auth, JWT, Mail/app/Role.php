<?php

namespace App;

use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use UsesUuid;

    protected $fillable = ['name'];


}
