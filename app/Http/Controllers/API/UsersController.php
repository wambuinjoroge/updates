<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Carbon\Carbon;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // login
    public function login(Request $request){

        $request->validate([
            'email'=>'required|string|email',
            'password'=>'required|string',
        ]);

        $user = User::where(['email',$request->email])->first();

        $token = $user->createToken('My Token')->accessToken;

        return $token;

        // if(!Auth::attempt($credentials))  
        //     return response()->json(['message'=>'Unauthorized'],401);
        //     $user = $request->user();
        //     $tokenResult = $user->createToken("Personal Access Token");
        //     $token = $tokenResult->token;

        //     if($request->remember_me){
        //         $token->expires_at = Carbon::now()->addweeks(1);
        //         $token->save();

        //         return response()->json([
        //             'access_token'=>$tokenResult->accessToken,
        //             'token_type'=>'Bearer',
        //             'expires_at'=>Carbon::parse(
        //                 $tokenResult->token->expires_at
        //             )->toDateTimeString()
        //         ]);
        //     }
    
    }

    public function index()
    {
        //
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
}
