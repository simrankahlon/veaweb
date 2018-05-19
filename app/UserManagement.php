<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserManagement extends Model
{
    protected $table= 'user';
    
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'password',
        'cell_number',
        'role'
    ];
    
    
    
}


