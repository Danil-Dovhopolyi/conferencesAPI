<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $fields = $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'country' => 'required|string',
            'role' => 'required|string',
        ]);
        $user = User::create([
            'firstname' => $fields['firstname'],
            'lastname' => $fields['lastname'],
            'password' => bcrypt($fields['password']),
            'country' => $fields['country'],
            'email' => $fields['email'],
            'role' => $fields['role'],
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;
        $user->assignRole($fields['role']);
        $response = [
            'user' => $user,
            'token' => $token,
            'roles' => $user->roles,
            'permissions'=>User::with('roles.permissions')->get()->find($user)
        ];
        return response($response, 201);
    }
    
    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        
        return [
            'message' => 'Logged out'
        ];
    }
    
    public function updateProfile(Request $request, $id)
    {
    
        $user = User::find($id);
    
        $user->firstname = $request['firstname'];
        $user->lastname = $request['lastname'];
        $user->email = $request['email'];
        $user->country = $request['country'];
        $user->password = bcrypt($request['password']);
        $user->save();
        return response()->json([
            'status'=>true,
            'message'=>'User updated succesfully',
            'user'=>$user,
        ], 200);
    }

    function login(Request $request)
    {
        $user= User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }
        
        $token = $user->createToken('myapptoken')->plainTextToken;
        
        $response = [
            'user' => $user,
            'token' => $token,
            'roles' => $user->roles,
            'permissions'=>User::with('roles.permissions')->get()->find($user)
      
            
        ];
        
             return response($response, 201);
    }
   
}


