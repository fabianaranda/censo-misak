<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    public $timestamps = false;	
        public $table = "personas"; 
         
    
        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        
         protected $fillable = [
            'documento_id', 'hogar_id','estado', 
        ];
}
