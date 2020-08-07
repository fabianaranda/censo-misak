<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


    class vivienda extends Model{ 
    public $timestamps = false;	
    public $table = "vivienda"; 
     

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    
     protected $fillable = [
        'nombre_pro', 'documento_pro', 
    ];

    public function posts()
    {
        return $this->hasMany(hogar::class);
    }


}
