<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Project extends Model
{
       use SoftDeletes;
      public static $rules=[
            'name' => 'required',
            //'description' =>'',
            'start'=>'date'
        ];

      public static  $messages=[
            'name.required' =>'Ingresa nombre de proyecto',
            'start.date' =>'La fecha es incorrecta'
        ];

        //Seguridad de campos
        protected $fillable =[
        	'name','description','start'
        ];
}
