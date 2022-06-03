<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactJobber extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function contactReponse(){
        return $this->hasOne(ContactReponse::class);
    }
}
