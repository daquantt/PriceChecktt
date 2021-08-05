<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // By default table name is plural of class above ie posts. If you want to change the Table Name 
    protected $table = 'posts';
    // if you want to change the Primary Key
    public $primaryKey = 'id';
    // if you want timestamps for records (its there by default)
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    use HasFactory;
}
