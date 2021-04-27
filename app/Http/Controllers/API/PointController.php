<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Point;

class PointController extends Controller
{

    public function checkPoint(Request $request)
    {
        $point = Point::where([
                ['residents_id','=',$request->id],
                ['points_expire','>',Carbon::now()]
            ])->sum('points_amount');
        return response()->json(['point' => $point]);
        //
    }
    //
}
