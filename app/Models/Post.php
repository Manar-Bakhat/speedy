<?php

namespace App\Models;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobber_id', 'service_title', 'service_ville',
        'service_zone', 'deadline',
        'service_specification'
    ];

    //user post piviot for savedJobs
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }
    public function useres(){
        return $this->belongsToMany(User::class,'ratings')->withPivot('stars_rated','created_at','message');
    }
    public function ratings(){
        return $this->hasMany(Rating::class);
    }

    public function jobber()
    {
        return $this->belongsTo('App\Models\Jobber');
    }

    public function deadlineTimestamp()
    {
        return Carbon::parse($this->deadline)->timestamp;
    }

    public function remainingDays()
    {
        $deadline = $this->deadline;
        $timestamp = Carbon::parse($deadline)->timestamp - Carbon::now()->timestamp;
        return $timestamp;
    }

    public function getSkills()
    {
        return explode(',', $this->skills);
    }

    public function useress(){
        return $this->belongsToMany(User::class,'contact_jobbers')->withPivot('created_at','messagee','id');
    }

    public function useresss(){
        return $this->belongsToMany(User::class,'contact_reponses')->withPivot('created_at','message','id');
    }


}
