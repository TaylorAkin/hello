<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    
    public function book(){
        return $this->belongsTo(Book::class, "bookid");
    }

    public function cardholder(){
        return $this->belongsTo(User::class, "userid");
    }


    protected $fillable = [
        "userid", 
        "bookid"
    ];
}
