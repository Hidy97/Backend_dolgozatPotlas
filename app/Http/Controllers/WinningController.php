<?php

namespace App\Http\Controllers;

use App\Models\winnings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WinningController extends Controller
{
    //

    public function index()
    {
        $winnings = response()->json(winnings::all());
        return $winnings;
    }

    public function show($id)
    {
        $winnings = response()->json(winnings::find($id));
        return $winnings;
    }

    public function store(Request $request)
    {
        $winnings = new winnings();
        $winnings->user_id = $request->user_id;
        $winnings->brand_id = $request->brand_id;
        $winnings->part_id = $request->part_id;
        $winnings->date = $request->date;
        $winnings->save();
    }

    public function update(Request $request, $id)
    {
        $winnings = winnings::find($id);
        $winnings->user_id = $request->user_id;
        $winnings->brand_id = $request->brand_id;
        $winnings->part_id = $request->part_id;
        $winnings->date = $request->date;
        $winnings->save();
    }

    public function felhasznaloNyeremenyek()
    {
        $user = Auth::user()->id;
        //Jelenítsd meg a bejelentkezett felhasználó nyereményei alapján azon terméktípusokat, 
        //amelyek neve tartalmazza a “g” betűt; innentől DB:table...
        return DB::table('winnings as w')
        ->join('products as p', 'w.product_id' ,'=','p.product_id')
        ->where('user_id','=', $user)
        ->where('p.name', 'like','%g%')
        ->select('p.name as g_betus_termekek')
        ->distinct()
        ->get();
        }


    public function destroy($id)
    {
        winnings::find($id)->delete();
    }
}
