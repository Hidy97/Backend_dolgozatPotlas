<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\winnings;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index()
    {
        $products = response()->json(products::all());
        return $products;
    }

    public function show($id)
    {
        $products = response()->json(products::find($id));
        return $products;
    }

    public function store(Request $request)
    {
        $products = new products();
        $products->name = $request->name;
        $products->part_id = $request->part_id;
        $products->brand_id = $request->brand_id;
        $products->save();
    }

    public function update(Request $request, $id)
    {
        $products = products::find($id);
        $products->name = $request->name;
        $products->part_id = $request->part_id;
        $products->brand_id = $request->brand_id;
        $products->save();
    }


    public function termekOsszesGyozelem($product_id)
    {
        //Az adott termékhez (paraméter az elsődleges kulcs) tartozó összes győzelem adatait jelenítsd meg (fg+with)!
        $winnings = products::with('winnings')->where('product_id', '=', $product_id)->get();
        return $winnings;
    }

    public function destroy($id)
    {
        products::find($id)->delete();
    }
}
