<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;

class categorycontroller extends Controller
{
    public function index(){

        $cat=Category::all(); 
        return view('backend/module/category/index',compact('cat'));

    }
    public function create(){
        $cat =Category::where('parent_id', '0')->get();
        return view('backend/module/category/addcategory', compact('cat'));

    }
    public function mainstore(Request $request){

        $cat = new Category();
        $cat->catg_name = $request->cat_main_title;
        $cat->status = 1;
        $cat->parent_id = 0;
        $cat->save();
        return redirect()->back();
    }
    public function substore(Request $request){
        
        $cat = new Category();
        $cat->catg_name = $request->cat_sub_title;
        $cat->parent_id = $request->parent_id;
        $cat->status = 1;
        $cat->save();
        return redirect()->back();
    }
    public function destroy($id){

        $cat = Category::find($id);
        $cat->delete();
        return redirect()->back();
    }
    public function edit($id){

        $cat=Category::where('parent_id', null)->get();
        $category=Category::find($id);
        return view('backend/module/category/editcategory',compact('category','cat'));
    }
     public function updatecatagory(Request $request){
    
        
        $cat = $request->id;
        $cat = Category::find($id);
        $cat->catg_name= $request->catg_name;
        $cat->parent_id = $request->parent_id;
        $cat->status = 1;
        $cat->update();
        return redirect('category/index');


    }
}
