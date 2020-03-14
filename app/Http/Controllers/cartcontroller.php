<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\User;
use App\Order;
use App\OrderDetail;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Syscover\ShoppingCart\Facades\CartProvider;
use Syscover\ShoppingCart\Item;
use Hash;
class cartcontroller extends Controller
{

    Public function index(){
        $p=Product::all();
        return view('frontend/pages/index',compact('p'));
    }
    public function addtocart($id){

        $p=Product::find($id);
        CartProvider::instance()->add(new Item($p->id,$p->title,1,$p->price));
        return redirect()->back();
    }
    public function showcart(){
        $sub=CartProvider::instance()->total;
         return view('frontend/pages/shoppingcart', compact('sub'));
    }
    public function updatecartitem(Request $request){

        $rowId =$request->rowId;
        $qty=$request->qty;

        if($qty <=0){
            CartProvider::instance()->remove($rowId);
        }
        else{
            CartProvider::instance()->setQuantity($rowId, $qty);
        }
        return redirect()->back();

    }
    public function removecartitem(){
            CartProvider::instance()->destroy();
            return redirect()->back();
    }
    public function checkout(){
            $sub=CartProvider::instance()->subtotal;
            return view('frontend/pages/checkout', compact('sub'));

    }
    public function shopcategory(){
            return view('frontend/pages/category');

    }
    public function orderconfirmation(){
            return view('frontend/pages/confirmation');

    }
    public function login(){
            return view('frontend/pages/login');

    }
    public function create(){
            return view('frontend/pages/register');

    }
    public function store(Request $request){
            $u=new User();
           
            $u->name=$request->name;
            $u->email=$request->email;
            $u->password= Hash::make($request->password);
            $u->address=$request->address;
            $u->status= 1;
            $file = $request->file('image');
            $image = $file->getClientOriginalName();
            $destination = public_path('/assets/images/');
            $file->move($destination, $image);
            $u->image = $image;
            $u->save();
            return redirect('/signup');
    }
    public function showsingleproduct($id){
            
            $show=Product::find($id);
            return view('frontend/pages/single-product', compact('show'));
            // return view('frontend/pages/single-product');

    }
    public function myOrder(){
         $order=Order::all();         
         return view('frontend/pages/myorder', compact('order'));
    }
    public function placeOrder(){
       echo $user = Auth::User();

        $totalprice = CartProvider::instance()->getSubtotal();
        $order = new Order();
        $order->user_id = $user->id;
        $order->total_amount = preg_replace('/[^a-zA-Z0-9_ -]/s', '.', $totalprice);
        $order->time = new Carbon();
        $order->pay_status = 0;
        $order->save();
        $orderId = $order->id;

        foreach (CartProvider::instance()->getCartItems() as $item) {
        $orderDetail = new OrderDetail();
       
        $orderDetail->order_id = $orderId;
        $orderDetail->product_id = $item->id;
        $orderDetail->price = $item->price;
        $orderDetail->quantity = $item->getQuantity();
        $orderDetail->product_name = $item->name;
        
        $orderDetail->save();

        }
        return redirect('/myorder')->with( Session::flash('message', 'Order Has Been Placed Successfully!!!'),CartProvider::instance()->destroy());

    }
}
    // public function index()
    // {
    //     CartProvider::instance()->add(new Item('293ad', 'Product 1', 1, 9.99));
    //     foreach(CartProvider::instance()->getCartItems() as $item)
    //     {
    //       print_r($item);
    //     }
    //     return view('welcome');
    // }
    // public function showcart()
    // {   
    //     foreach(CartProvider::instance()->getCartItems() as $item)
    //      {
    //       print_r($item);
    //      }
    //     // echo 'hello';
    //      die;
    //     return view('come');
    // }