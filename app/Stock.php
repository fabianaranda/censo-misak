<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    
    public $timestamps = false;	
        public $table = "postres"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'nombre', 'stock', 'precio', 
        ];
}
