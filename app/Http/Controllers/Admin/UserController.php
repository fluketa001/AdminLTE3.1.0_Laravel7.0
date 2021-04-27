<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;
use App\User;

class UserController extends Controller
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
        $users = User::all();
        return view('admin.user.index')->with('data',$users);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.user.add');
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
            'name' => 'string',
            'username' => 'string',
            'password' => 'string|min:4|confirmed',
            'password_confirmation' => 'string|min:4',
            'telephone' => 'string',
            'status' => 'string'
        ]);
        $username = User::where('users_username',$validated['username'])->first();
        if($username){
            return redirect()->back()->with('message','duplicate');
        }
        $users = User::create([
            'users_name' => $validated['name'],
            'users_username' => $validated['username'],
            'users_password' => Hash::make($validated['password']),
            'users_telephone' => $validated['telephone'],
            'users_status' => $validated['status'],
        ]);
        if($users->id){
            return redirect()->route('users')->with('message','success');
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
        $users = User::where('id',$id)->first();
        if($users){
            return view('admin.user.edit')->with('data',$users);
        }else{
            redirect()->route('users')->with('message','error');
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
            'name' => 'string',
            'telephone' => 'string',
            'status' => 'string'
        ]);
        $users = User::where('id',$validated['id'])->update([
                'users_name' => $validated['name'],
                'users_telephone' => $validated['telephone'],
                'users_status' => $validated['status'],
            ]);
        if($users){
            return redirect()->route('users')->with('message','edit');
        }else{
            return redirect()->route('users')->with('message','error');
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
        $users = User::where('id',$id)->first();
        if($users->users_status == '0'){
            $sum = User::where('users_status','0')->sum('id');
            if($sum <= 1){
                return redirect()->route('users')->with('message','one');
            }
        }
        $users = User::where('id',$id)->delete();
        if($users){
            return redirect()->route('users')->with('message','delete');
        }else{
            return redirect()->route('users')->with('message','error');
        }
        //
    }

    public function resetPassword($id)
    {
        $users = User::where('id',$id)->update([
                'users_password' => Hash::make('1234'),
            ]);
        if($users){
            return redirect()->route('users')->with('message','reset');
        }else{
            return redirect()->route('users')->with('message','error');
        }
        //
    }
}
