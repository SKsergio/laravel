<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Curso extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'categoria'];

    protected $guarded = [];

    protected function course_name():Attribute{
        return new Attribute(

            //Accesores
            get:function($value){
                return ucwords($value);  //It's return the string with the first letter in Uppercase
            },
            //mutador
            set: function($value){
                return strtolower(filter_var($value, FILTER_SANITIZE_STRING));  //It clean the string and converts text to lowercase, finally save the change
            }
        );
    }

    // Friendly Route
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
