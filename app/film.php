<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class film extends Model
{
    protected $fillable = ['title','description'];

    use SoftDeletes;
    protected $dates = ['delete_at'];
}
