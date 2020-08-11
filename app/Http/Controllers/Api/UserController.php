<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'name'  => 'required|string|max:255',
          'email' => 'required|string|max:255|email|unique:users'
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->errors()], 406);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json($user, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        return response()->json($user);
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
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $validator = Validator::make($request->all(), [
          'name'  => 'required|string|max:255',
          'email' => 'required|string|max:255|email|unique:users,email,{$id}'
        ]);

        if($validator->fails()){
            return response()->json(['message' => $validator->errors()], 406);
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return response()->json($user, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'Record not found'], 404);
        }

        $user->delete();
    }
}
