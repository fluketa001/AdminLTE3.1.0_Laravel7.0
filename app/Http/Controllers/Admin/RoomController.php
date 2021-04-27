<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use App\Room;
use App\Equipment;
use App\EquipmentList;

class RoomController extends Controller
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
        $rooms = Room::all();
        return view('admin.room.index')->with('data',$rooms);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments = Equipment::all();
        return view('admin.room.add')->with('data',$equipments);
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
        $validated = $request->validate([
            'rooms_number' => 'string',
            'rooms_house_number' => 'string',
            'rooms_type' => 'string',
            'rooms_size' => 'string',
            'rooms_status' => 'string',
            'rooms_building' => 'string',
            'rooms_direction' => 'string',
            'rooms_standard_price' => 'string',
            'rooms_contract_type' => 'string'
        ]);
        $rooms = Room::where('rooms_number',$validated['rooms_number'])->orWhere('rooms_house_number',$validated['rooms_house_number'])->first();
        if($rooms){
            return redirect()->back()->with('message','duplicate');
        }
        $rooms = Room::create([
            'rooms_number' => $validated['rooms_number'],
            'rooms_house_number' => $validated['rooms_house_number'],
            'rooms_type' => $validated['rooms_type'],
            'rooms_size' => $validated['rooms_size'],
            'rooms_status' => $validated['rooms_status'],
            'rooms_building' => $validated['rooms_building'],
            'rooms_direction' => $validated['rooms_direction'],
            'rooms_standard_price' => $validated['rooms_standard_price'],
            'rooms_contract_type' => $validated['rooms_contract_type'],
        ]);
        if($request->input('equipments_id')){
            foreach($request->input('equipments_id') as $equip){
                EquipmentList::create([
                    'rooms_id' => $rooms->id,
                    'equipments_id' => $equip,
                ]);
            }
        }
        if($rooms->id){
            return redirect()->route('rooms')->with('message','success');
        }else{
            return redirect()->back()->with('message','error');
        }
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
        // $equipments = Equipment::leftJoin('equipments_list', 'equipments_list.equipments_id', '=', 'equipments.id')
        //     ->select('equipments.id','equipments.equipments_name','equipments_list.equipments_id','equipments_list.rooms_id')
        //     // ->where('rooms_id',$id)
        //     ->get();
        //
        $equipments = Equipment::orderBy('id','asc')->get();
        $equipments_list = EquipmentList::where('rooms_id',$id)->orderBy('equipments_id','asc')->get();
        $rooms = Room::where('id',$id)->first();
        // dd($equipments);
        if($rooms){
            return view('admin.room.detail')->with('data',$rooms)->with('equipment',$equipments)->with('equipments_list',$equipments_list);
        }else{
            redirect()->route('rooms')->with('message','error');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipments = Equipment::orderBy('id','asc')->get();
        // $rooms = Room::leftJoin('equipments_list', 'equipments_list.rooms_id', '=', 'rooms.id')
        //     ->leftJoin('equipments', 'equipments_list.equipments_id', '=', 'equipments.id')
        //     ->select('*')
        //     ->get();
        // $equipments = Equipment::leftJoin('equipments_list', 'equipments_list.equipments_id', '=', 'equipments.id')
        //     ->select('equipments.id','equipments.equipments_name','equipments_list.equipments_id','equipments_list.rooms_id')
        //     // ->where('rooms_id',$id)
        //     ->get();
        $equipments_list = EquipmentList::where('rooms_id',$id)->orderBy('equipments_id','asc')->get();
        $rooms = Room::where('id',$id)->first();
        // dd($equipments);
        if($rooms){
            return view('admin.room.edit')->with('data',$rooms)->with('equipment',$equipments)->with('equipments_list',$equipments_list);
        }else{
            redirect()->route('rooms')->with('message','error');
        }
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'string',
            'rooms_number' => 'string',
            'rooms_house_number' => 'string',
            'rooms_type' => 'string',
            'rooms_size' => 'string',
            'rooms_status' => 'string',
            'rooms_building' => 'string',
            'rooms_direction' => 'string',
            'rooms_standard_price' => 'string',
            'rooms_contract_type' => 'string'
        ]);
        $rooms = Room::where('id',$validated['id'])->update([
            'rooms_number' => $validated['rooms_number'],
            'rooms_house_number' => $validated['rooms_house_number'],
            'rooms_type' => $validated['rooms_type'],
            'rooms_size' => $validated['rooms_size'],
            'rooms_status' => $validated['rooms_status'],
            'rooms_building' => $validated['rooms_building'],
            'rooms_direction' => $validated['rooms_direction'],
            'rooms_standard_price' => $validated['rooms_standard_price'],
            'rooms_contract_type' => $validated['rooms_contract_type'],
        ]);
        if($request->input('equipments_id')){
            EquipmentList::where('rooms_id',$validated['id'])->delete();
            foreach($request->input('equipments_id') as $equip){
                EquipmentList::create([
                    'rooms_id' => $validated['id'],
                    'equipments_id' => $equip,
                ]);
            }
        }
        if($rooms){
            return redirect()->route('rooms')->with('message','edit');
        }else{
            return redirect()->route('rooms')->with('message','error');
        }
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
        EquipmentList::where('rooms_id',$id)->delete();
        $rooms = Room::where('id',$id)->delete();
        if($rooms){
            return redirect()->route('rooms')->with('message','delete');
        }else{
            return redirect()->route('rooms')->with('message','error');
        }
        //
    }
}
