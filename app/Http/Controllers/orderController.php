<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Dotenv\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class orderController extends Controller
{


     /**
     * @name viewOrder
     * @role products view
     * @param \Illuminate\Http\Request  $request
     * @return json data
     *
     */
    public function viewOrder()
    {
        $products = product::get();
        return response()->json($products);
    }


         /**
     * @name storeOrder
     * @role new product insert
     * @param \Illuminate\Http\Request  $request
     * @return view
     *
     */

    public function storeOrder(Request $request){

        $validateData = $request->validate([
            'product_name'      =>     "required | Max:250",
            'p_taste'           =>     "required | Max:250",
            'p_price_kg'        =>     "required",
            'p_stock_kg'        =>     "required",
            'p_status'          =>     "required",

        ]);

   

        $product_name = $request->product_name;
        $product_id    = "P".mt_rand(0,10000);
        $p_taste      = $request->p_taste;

        $p_price_kg   = $request->p_price_kg;
        $p_price_gram = $p_price_kg / 1000;

        $p_stock_kg   =  $request->p_stock_kg;
        $p_stock_gram =  $p_stock_kg * 1000;

        $p_status     = $request->p_status;

        $data                    = new product();
        $data-> product_name     = $product_name;
        $data-> product_id       = $product_id;
        $data-> p_taste          = $p_taste;
        $data-> p_price_gram     = $p_price_gram;
        $data-> p_stock_gram     = $p_stock_gram;
        $data-> p_status         = $p_status;
        $result                  = $data->save();

        if($result){
            return ["Result" => "Data Has Been Saved"];
        }

        else
        {
            return ["Result" => "Operation Failed"];
        }




    }

}
