<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    protected $table= 'word';
    
    protected $fillable = [
        'std_id',
        'title',
        'worddoc',
        'created_at'        
    ];
}
