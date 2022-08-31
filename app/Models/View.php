<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'views';
    public function movie(){
        return $this->belongsTo(Movie::class,'movie_id','id');
    }
}
