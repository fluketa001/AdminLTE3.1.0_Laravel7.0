<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ListDelete;
use App\Rent;
use File;

class ListDeleteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.user');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lists = ListDelete::orderby('updated_at','asc')->get();
        return view('admin.delete.index')->with('data',$lists);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $list = ListDelete::where('id',$id)->first();

        $ip = $_SERVER['REMOTE_ADDR'];
        $date = @date("d/m/Y H:i:s");
        $content = '    '.$date.'-->IP: '.$ip.
                    '   rents_month->: '.$list->rents_month.'   rents_month_end->: '.$list->rents_month_end.'   rents_payment->: '.$list->rents_payment.'   rents_datetime->: '.$list->rents_datetime.' '.
                    '   rooms_number->: '.$list->rooms_number.' rooms_house_number->: '.$list->rooms_house_number.' residents_name->: '.$list->residents_name.
                    '   residents_telephone->: '.$list->residents_telephone.'   residents_rent_price->: '.$list->residents_rent_price.' residents_id->: '.$list->residents_id.
                    '   ผู้บันทึก->: '.$list->users_name.'   ผู้แจ้ง->: '.$list->informer.'   SuperAdmin->: '.auth('user')->user()->users_name;
        File::makeDirectory("list/".date("Ymd"), $mode = 0777, true, true);
        $random = rand(123456,999999);
        $objFopen= fopen("list/".date("Ymd")."/".date("His_").$random."_delete.log","w+");
        $pathFile = "list/".date("Ymd")."/".date("His_").$random."_delete.log";
        $result=fwrite($objFopen,$content);
        fclose($objFopen);
        //
        $image_path = "slip/".$list->rents_slip;  // path image
        if (file_exists("slip")) {
            unlink($image_path);
        }

        $lists = ListDelete::where('id',$id)->delete();
        if($lists){
            return redirect()->route('lists')->with('message','list-delete');
        }else{
            return redirect()->route('lists')->with('message','error');
        }
    }

    public function cancel($id) {
        $list = ListDelete::where('id',$id)->first();

        $rents = Rent::create([
            'rents_month' => $list->rents_month,
            'rents_month_end' => $list->rents_month_end,
            'rents_datetime' => $list->rents_datetime,
            'rents_slip' => $list->rents_slip,
            'rents_payment' => $list->rents_payment,
            'rooms_number' => $list->rooms_number,
            'rooms_house_number' => $list->rooms_house_number,
            'residents_name' => $list->residents_name,
            'residents_telephone' => $list->residents_telephone,
            'residents_rent_price' => $list->residents_rent_price,
            'residents_id' => $list->residents_id,
            'users_name' => $list->users_name
        ]);

        $lists = ListDelete::where('id',$id)->delete();
        if($lists){
            return redirect()->route('lists')->with('message','list-cancel');
        }else{
            return redirect()->route('lists')->with('message','error');
        }
    }
}
