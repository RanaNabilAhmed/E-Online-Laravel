<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use DB;

class productcontroller extends Controller
{
    public function index()
    {
        // $p=Product::all();
        $p=DB::table('products')
        ->join('categorys','products.category_id','=','categorys.ct_id')
        ->get();
        return view('backend/module/product/index', compact('p'));
    }

    public function create()
    {
        $cat=Category::all();
        return view('backend/module/product/addproduct', compact('cat'));
    }
    public function store(Request $request)
    {
        $p = New Product();
        $p->title = $request->title;
        $p->description = $request->desc;
        $p->price = $request->price;
        $p->discount = $request->discount;
        $p->category_id = $request->parent_id;
        $p->status = 1;
        $p->expiry_date = $request->e_date;
        $p->manufacture_date = $request->m_date;
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $destination = public_path('/assets/images/');
        $file->move($destination, $image);
        $p->product_image = $image;
        $p->save();
        return redirect()->back();
    }
    public function destroy($id){
        $p=Product::find($id);
        $p->delete();
        return redirect()->back();
    }
    public function blockview()
    {
        // $p=Product::all()->where('status',0);
        $p=DB::table('products')
        ->join('categorys','products.category_id','=','categorys.ct_id')
        ->where('products.status',0)
        ->get();
        return view('backend/module/product/blockproduct', compact('p'));
    }
    public function blockproduct($id)
    {
        $p=Product::find($id);
        $p->status=0;
        $p->update();
        $p=Product::all()->where('status',1);
        return view('backend/module/product/index', compact('p'));
    }
    public function activeproduct($id){

        $p=Product::find($id);
        $p->status=1;
        $p->update();
        return redirect()->back();

    }
    public function edit($id){
        $p=Product::find($id);
        $cat=Category::all();
        return view('backend/module/product/editproduct', compact('p','cat'));
    }
    public function update(Request $request){
        $id=$request->id;
        $p=Product::find($id);
        $p->title = $request->title;
        $p->description = $request->desc;
        $p->price = $request->price;
        $p->discount = $request->discount;
        $p->category_id = $request->parent_id;
        $p->status = 1;
        $p->expiry_date = $request->e_date;
        $p->manufacture_date = $request->m_date;
        $file = $request->file('image');
        $image = $file->getClientOriginalName();
        $destination = public_path('/assets/images/');
        $file->move($destination, $image);
        $p->product_image = $image;
        $p->update();
        return redirect('product/index');
    }
}
