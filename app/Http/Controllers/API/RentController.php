<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Rent;
use App\Room;

class RentController extends Controller
{
    public function roomMonth(Request $request)
    {
        $room = Room::where('id',$request->id)->first();
        $rent = Rent::where('rooms_number',$room->rooms_number)->orderby('rents_month_end','desc')->first();
        return response()->json(['month' => $rent]);
        //
    }
    //
}
