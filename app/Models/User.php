<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Http\Controllers\UserPostController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // this is function is for relationship 
    //between user_id and posts table
    //this user_id belongs to the user, where any user has an ID
    public function posts(){
        return $this->hasMany(Post::class); 
    }
    public function likes(){
        return $this->hasMany(Like::class);
    }
    // show likes
    public function receivedLikes(){
        return $this->hasManyThrough(Like::class, Post::class);
    }
}
