<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sitebanner extends Model
{
    protected $fillable =['banner','banner_message','banner_image','sub_title','status'];
}
