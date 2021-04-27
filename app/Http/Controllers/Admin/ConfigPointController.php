<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ConfigPoint;

class ConfigPointController extends Controller
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
        $config_point = ConfigPoint::all();
        return view('admin.config_point.index')->with('data',$config_point);
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
        $config_point = ConfigPoint::where('id',$id)->first();
        return view('admin.config_point.edit')->with('data',$config_point);
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
        // dd($request->all());
        $validated = $request->validate([
            'id' => 'string',
            'config_points_price' => 'string',
            'config_points_rate_change' => 'string',
            'config_points_expire' => 'string'
        ]);

        $config_point = ConfigPoint::where('id',$validated['id'])->update([
            'config_points_price' => $validated['config_points_price'],
            'config_points_rate_change' => $validated['config_points_rate_change'],
            'config_points_expire' => $validated['config_points_expire']
        ]);

        if($config_point){
            return redirect()->route('config-points')->with('message','edit');
        }else{
            return redirect()->back()->with('message','error');
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
        //
    }
}
