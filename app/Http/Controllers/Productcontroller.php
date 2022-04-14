<?php

namespace App\Http\Controllers;
use Illuminate\support\facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\cart;
use App\Models\order;
use App\Models\user;
use App\Models\Banner;
use Session;
class Productcontroller extends Controller
{
    //
   
    function index()
    { 
        $ms = Banner::all();
        $persons = Product::all();
        
    return view('products', compact(['ms', 'persons']));
    }
       
    
    
    function detail($id)
    { 
        $data=Product::find($id);
        return view('detail',['product'=>$data]);
      
    }
    function addtocart(Request $req)
    { 
        if($req->session()->has('user'))
        {
            $cart= new cart;
            $cart->product_id=$req->product_id;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->save();
            return redirect('/');
        }
       else{
        return redirect('login');
       }
      
    }
       static function cart()
    { 
       $userid=Session::get('user')['id'];
       return Cart::where('user_id',$userid)->count();
       }

    function cartdetails()
    { 
        $userid=Session::get('user')['id'];
        $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userid)
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartdetails',['products'=>$products]);
    }
    function removCart($id)
    { 
        Cart::destroy($id);
        return redirect('cartdetails');
        
    }
    function ordernow()
    { 
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('cart')
         ->join('products','cart.product_id','=','products.id')
         ->where('cart.user_id',$userId)
         ->sum('products.price');
 
         return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_id',$userId)->delete(); 
         }
       
         return redirect('/');
    }
    function myorder(Request $req)
    {
        
        $userId=Session::get('user')['id'];
        $order= DB::table('order')
         ->join('products','order.product_id','=','products.id')
         ->where('order.user_id',$userId)
         ->get();
 
         return view('myorders',['order'=>$order]);
       
         }
        
}