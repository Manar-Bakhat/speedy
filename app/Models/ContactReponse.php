<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactReponse extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contactJobber(){
        return $this->belongsTo(ContactJobber::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
