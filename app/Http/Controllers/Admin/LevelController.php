<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Level;

class LevelController extends Controller
{
     public function store(Request $request){
    	$this->validate($request,[
    		'name'=> 'required'
    	],[
    		'name.required' => 'Ingresa nombre del nivel.'
    	]
    	);

    	Level::create($request->all());
    	return back();
    }

     public function update(Request $request){
    	$this->validate($request,[
    		'name'=> 'required'
    	],[
    		'name.required' => 'Ingresa nombre del nivel.'
    	]
    	);

    	$level_id = $request->input('level_id');
        $level= Level::find($level_id);
        $level->name = $request->input('name');
        $level->save();

    	return back();
    }

    public function delete($id){

        Level::find($id)->delete();

        return back();
    }
}
