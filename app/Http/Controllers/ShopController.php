<?php

namespace App\Http\Controllers;
use App\Item;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    function showIndex(){
        $items =Item::all()->take(6);
        return view('index',compact('items'));
    }
    function showPromotion (){
        return view('promotion');
    }
    function showLogin (){
        return view('login');
    }
    function showRegister (){
        return view('register');
    }
    function showShoppingcart (){
        return view('shoppingcart');
    }
    function showSubcategory (){
        return view('subcategory');
    }

    function showBrand(){
        return view('brand');
    }

    function showItemdetail(){
        return view('itemdetail');
    }
}
