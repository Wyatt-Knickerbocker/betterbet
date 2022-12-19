<?php

namespace App\Http\Controllers\Database;

use Illuminate\Http\Request;
use App\Models\ProductOffered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class ProductOfferedController extends Controller
{
    /**
     * Show the profile for a given user.
     *
     * @param  string  $ian
     * @return \Illuminate\View\View
     */
    public function add(Request $request)
    {
        DB::table('productoffered')->insert(
            array('seller_id' => Auth::user()->id, 'product_ian' => $request->ian, 'cost' => $request->cost,'ship_cost' => $request->ship_cost,'ship_time' => $request->ship_time)
        );
        return redirect('products');
    }

    public function remove(Request $request)
    {
        DB::table('productoffered')->where('seller_id', Auth::user()->id)->where('product_ian', $request->ian)->delete();
        return redirect('products');
    }
}