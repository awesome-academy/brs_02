<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = "catetory";
    protected $primaryKey = "cat_id";
    public $timestamps = false;


}
