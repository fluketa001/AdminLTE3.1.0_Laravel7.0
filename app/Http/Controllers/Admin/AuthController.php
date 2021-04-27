<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('user')->check()) {
            return View('admin.home'); 
        }else{
            return View('admin.auth.login'); 
        }
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
        //
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:100',
            'password' => 'required|string|min:4',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->with('message', 'error');
            // return response()->json($validator->errors(), 400);
        }
        $credential = array(
            'users_username' => $request->input('username'),
            'password' => $request->input('password'),
        );
        // return response()->json(['error' => Auth::guard('admin')->attempt($credential)], 200);

        if (Auth::guard('user')->attempt($credential)) {
            return redirect()->route('admin-home'); 
            
        }else{
            return Redirect::back()->with('message', 'error');
            // return response()->json(['error' => 'Password Incorect!'], 401);
        }
    }

    public function logout()
    {
        // auth()->logout();
        Auth::guard('user')->logout();
        return redirect()->route('admin-login');    
        // return response()->json(['message' => 'User successfully signed out']);
    }
}
