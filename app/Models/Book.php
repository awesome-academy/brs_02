<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    protected $table = "book";
    protected $primaryKey = "book_id";
    public $timestamps = true;

}
