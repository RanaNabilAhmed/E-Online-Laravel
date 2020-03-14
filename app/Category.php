<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categorys';
    protected $primaryKey = 'ct_id';

    public static function getCatName($id){
    	if($id !== null){
    		//enter
	    	$parent_name = category::find($id);
	    	return $parent_name['catg_name'];
    	}else{

    	}
    }
}
