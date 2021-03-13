<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        'body'
    ];

    // check if the use has liked the post
public function likedBy(User $user){
        return $this->likes->contains('user_id', $user->id);
    }

    // delete a post which is belong to 
    // public function ownedBy(User $user){
    //     return $user->id === $this->user_id;
    // }
    // this is function will return the user 
    // this is a relationship system that is why
    public function user(){
        return  $this->belongsTo(User::class);
    }
    // this is function is for like relationships
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
