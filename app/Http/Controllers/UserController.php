<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'results' => $users
        ], 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);
            return response()->json([
            'message' => "User successfully created"
        ], 200);
        } catch (\Exception $e){
            return response()->json([
            'message' => "Fill up the ff"
        ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $userfind = User::find($id);
        if(!$userfind){
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        return response()->json([
            'user' => $userfind,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        try {
            $user = User::find($id);
            if(!$user){
                return response()->json([
                    'message' => "User Not Found",
                ], 404);
            }

            $user->name = $request->name;
            $user->email = $request->email;

            $user->save();

            return response()->json([
                    'message' => "Successfully Update",
                ], 200);
        } catch (\Exception $e){
            return response()->json([
            'message' => "Something went wrong"
        ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $userfind = User::find($id);
        if(!$userfind){
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        $userfind->delete();

        return response()->json([
            'message' => 'Successfully Deleted',
        ]);
    }
}
