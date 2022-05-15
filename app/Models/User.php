<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'date_naissance',
        'photo',
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function postes(){
        return $this->belongsToMany(Post::class,'ratings')->withPivot('stars_rated','created_at','message');
    }

    public function jobber()
    {
        return $this->hasOne('App\Models\Jobber');
    }

    //piviot for saved jobs
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post');
    }

    public function applied()
    {
        return $this->hasMany('App\Models\JobApplication');
    }

    public function exist($post)
    {
        // $this->postes c'est comme on est dans dans le pivot (table ratings)
        return $this->postes()->where('post_id',$post->id)->exists();
    }
}
