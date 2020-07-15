<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // login
    public function login(Request $request){
        // validate the request
        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);
        if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
            $user = Auth::user();
        }

        // $user = User::find(1);
    
        $token = $user->createToken('My Token')->accessToken;

        return \Response::json([
            'access_token'=>$token,
            'token_type'=>'Bearer',
            // 'expires_at'=>Carbon::parse($token->expires_at)->toDateTimeString()
        ]);
    
    }

    public function index()
    {
        //Fetch all users
        $users=User::all();
        return response()->json([$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Fetch a single user
        // print_r($request->all());exit;
        $request->validate([
            'name'=>'required',
            'email'=>'required|string',
            'password'=>'required'
        ]);

        $user= new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        // $user->password = $request->get->Hash::make('password');
        $user->password = Hash::make($request->get('password'));

        $user->save();
    

        return \Response::json([
            'message'=>'User created successfully',
            $user,201
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($user)
    {
        // $user = User::find($user);
        // print_r($user);exit;
        return \Response::json(['message'=>'Successfully fetched user',$user,201]);
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
        // print_r($request->all());exit;
        $request->validate([
            'name'=>'required',
            'email'=>'required|string',
            'password'=>'required'
        ]);
        $user = User::find($id);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));

        $user->save();

        return \Response::json(['message'=>'User updated successfully',$user,201]);
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
        $user = User::find($id);
        $user->delete();

        return \Response::json(['message'=>'User deleted successfully',$user,201]);
    }
}
