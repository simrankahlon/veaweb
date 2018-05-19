<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenses extends Model
{
    protected $table= 'tenses';
    
    protected $fillable = [
        'title',
        'paraone',
        'paratwo',
        'created_at'        
    ];
    
}
