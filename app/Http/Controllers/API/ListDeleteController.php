<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListDelete;

class ListDeleteController extends Controller
{

    public function listNum(Request $request)
    {
        $num = ListDelete::count('id');
        return response()->json(['num' => $num]);
        //
    }
    //
}
