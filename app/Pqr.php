<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pqr extends Model
{
    protected $table = 'pqrs';
    protected $primaryKey = 'id';
    
    public $incrementing = true;
    public $timestamps = true;

}
