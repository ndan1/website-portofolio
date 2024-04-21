<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function komentar(){
        return $this->belongsTo(Komentar::class);
    }

}
