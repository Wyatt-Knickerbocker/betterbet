<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class CookieController extends Controller
{
    public function addCart(Request $request){

        $ian = $request->ian;
        $arr = array();

        if (Cookie::has('cart') != false) {
            $arr = json_decode(Cookie::get('cart'));
            Cookie::forget('cart');
        }

        array_push($arr, $ian);
        sort($arr);

        Cookie::queue('cart', json_encode($arr));

        return back();
    }

    public function pullCart(Request $request){

        $ian = $request->ian;
        $arr = array();
        
        if (Cookie::has('cart') != false) {
            $arr = json_decode(Cookie::get('cart'));
            Cookie::queue(Cookie::forget('cart'));

            if(count($arr) == 1){
                return back();
            }

            $i = 0;
            foreach($arr as $prod)
            {
                if($prod != $ian){
                    $i = $i+1;}
                else{
                    array_splice($arr, $i, 1);
                    break;
                }
            }

            if(count($arr) > 0){
                Cookie::queue('cart', json_encode($arr));}
        }
        
        return back();
    }
}
