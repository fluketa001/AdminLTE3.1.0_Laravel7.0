<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use App\Equipment;

class EquipmentController extends Controller
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
        $equipments = Equipment::all();
        return view('admin.equipment.index')->with('data',$equipments);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipment.add');
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
            'equipments_name' => 'string'
        ]);
        
        $equipments = Equipment::create([
            'equipments_name' => $validated['equipments_name'],
        ]);
        if($equipments->id){
            return redirect()->route('equipments')->with('message','success');
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
        $equipments = Equipment::where('id',$id)->first();
        if($equipments){
            return view('admin.equipment.edit')->with('data',$equipments);
        }else{
            redirect()->route('equipments')->with('message','error');
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
            'equipments_name' => 'string'
        ]);
        $equipments = Equipment::where('id',$validated['id'])->update([
            'equipments_name' => $validated['equipments_name'],
        ]);
        if($equipments){
            return redirect()->route('equipments')->with('message','edit');
        }else{
            return redirect()->route('equipments')->with('message','error');
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
        $equipments = Equipment::where('id',$id)->delete();
        if($equipments){
            return redirect()->route('equipments')->with('message','delete');
        }else{
            return redirect()->route('equipments')->with('message','error');
        }
        //
    }
}
