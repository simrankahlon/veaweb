<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essay extends Model
{
    protected $table= 'essay';
    
    protected $fillable = [        
        'std_id',
        'title',
        'essaydoc',
        'created_at'        
    ];
}
