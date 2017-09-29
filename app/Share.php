<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = ['name', 'link', 'desc', 'user_id', 'user_name'];
}
