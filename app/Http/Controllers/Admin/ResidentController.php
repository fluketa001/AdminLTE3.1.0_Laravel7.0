<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use App\Resident;
use App\Room;

class ResidentController extends Controller
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
        $residents = Resident::leftJoin('rooms', 'residents.rooms_id', '=', 'rooms.id')
            ->select('*','residents.id')
            ->where('residents.residents_status','1')
            ->get();
            // dd($residents);
        return view('admin.resident.index')->with('data',$residents);
        //
    }

    public function indexNotRent()
    {
        $residents = Resident::leftJoin('rooms', 'residents.rooms_id', '=', 'rooms.id')
            ->select('*','residents.id')
            ->where('residents.residents_status','0')
            ->get();
            // dd($residents);
        return view('admin.resident.notrent')->with('data',$residents);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::all();
        return view('admin.resident.add')->with('data',$rooms);
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
            'rooms_id' => 'string',
            'residents_name' => 'string',
            'residents_telephone' => 'string',
            'residents_career' => 'string',
            'residents_rent_price' => 'string',
            'residents_contract_start' => 'string',
            'residents_contract_end' => 'string',
            'residents_address' => 'string',
            'residents_emergency' => 'string',
            'residents_status' => 'string'
        ]);
        if(empty($request->residents_note)){
            $residents_note = '';
        }else{
            $residents_note = $request->residents_note;
        }
        
        $residents = Resident::create([
            'rooms_id' => $validated['rooms_id'],
            'residents_name' => $validated['residents_name'],
            'residents_telephone' => $validated['residents_telephone'],
            'residents_career' => $validated['residents_career'],
            'residents_rent_price' => $validated['residents_rent_price'],
            'residents_contract_start' => $validated['residents_contract_start'],
            'residents_contract_end' => $validated['residents_contract_end'],
            'residents_address' => $validated['residents_address'],
            'residents_emergency' => $validated['residents_emergency'],
            'residents_status' => $validated['residents_status'],
            'residents_note' => $residents_note,
        ]);
        if($residents->id){
            return redirect()->route('residents')->with('message','success');
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
        $residents = Resident::leftJoin('rooms', 'residents.rooms_id', '=', 'rooms.id')
            ->select('*','residents.id')
            ->where('residents.id',$id)
            ->first();
        $rooms = Room::orderBy('id','asc')->get();
        // dd($residents);
        // $residents = Resident::where('id',$id)->first();
        return view('admin.resident.edit')->with('data',$residents)->with('rooms',$rooms);
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
            'rooms_id' => 'string',
            'residents_name' => 'string',
            'residents_telephone' => 'string',
            'residents_career' => 'string',
            'residents_rent_price' => 'string',
            'residents_contract_start' => 'string',
            'residents_contract_end' => 'string',
            'residents_address' => 'string',
            'residents_emergency' => 'string',
            'residents_status' => 'string'
        ]);
        if(empty($request->residents_note)){
            $residents_note = '';
        }else{
            $residents_note = $request->residents_note;
        }
        $residents = Resident::where('id',$validated['id'])->update([
            'rooms_id' => $validated['rooms_id'],
            'residents_name' => $validated['residents_name'],
            'residents_telephone' => $validated['residents_telephone'],
            'residents_career' => $validated['residents_career'],
            'residents_rent_price' => $validated['residents_rent_price'],
            'residents_contract_start' => $validated['residents_contract_start'],
            'residents_contract_end' => $validated['residents_contract_end'],
            'residents_address' => $validated['residents_address'],
            'residents_emergency' => $validated['residents_emergency'],
            'residents_status' => $validated['residents_status'],
            'residents_note' => $residents_note,
        ]);
        if($residents){
            return redirect()->route('residents')->with('message','edit');
        }else{
            return redirect()->route('residents')->with('message','error');
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
        $residents = Resident::where('id',$id)->delete();
        if($residents){
            return redirect()->route('residents')->with('message','delete');
        }else{
            return redirect()->route('residents')->with('message','error');
        }
        //
    }
}
