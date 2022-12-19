<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

     public function declare(Request $request)
     {
        $imageName = time().'.'.$request->img->getClientOriginalExtension();
        $request->img->move(public_path('/img'), $imageName);
        $imageName = '/img/'.$imageName;
        DB::table('product')->insert(
            array('ian' => $request->ian, 'productcategory_id' => $request->cat,'brand' => $request->name,'image_path' => $imageName)
        );
         return redirect()->route('declare-product', ['product' => $request->ian]);
     }
    
    public function add(Request $request)
    {
        $ian = $request->ian;
        $i = 0;
        foreach($request->specnum as $num) {
            $specnum[$i] = $num;
            $i = $i + 1;
        }

        $i = 0;
        foreach($request->specval as $val) {
            DB::table('productspec')->insert(
                array('product_ian' => $ian, 'specification_id' => $specnum[$i], 'value' => $val)
            );
            $i = $i + 1;
        }

        return redirect()->route('new-product', ['ian' => $request->ian]);
    }
}