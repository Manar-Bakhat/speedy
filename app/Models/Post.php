<?php

namespace App\Models;

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
        return $this->hasMany(Comment::class);
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
}
