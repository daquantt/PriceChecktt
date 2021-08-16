<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Laravel\Scout\Searchable;


class Post extends Model
{
    use HasFactory;
    use Searchable;
    
    // By default table name is plural of class above ie posts. If you want to change the Table Name 
    protected $table = 'posts';
    // if you want to change the Primary Key
    public $primaryKey = 'id';
    // if you want timestamps for records (its there by default)
    public $timestamps = true;

    
    //checks if user already liked post        
    public function likedBy(User $user)
    {
        // return $this->likes()->where('user_id', auth()->id())->exists();
        return $this->likes->contains('user_id', $user->id);
    }
    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    
    public function likes()
    {
        return $this->hasMany('App\Models\Like');
    }

    public function searchableAs()
    {
        return 'title';
    }

}
