<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;
use Log;

class UserController extends Controller
{
    public function register(Request $request) {
        try{
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'image' => 'required|string', 
        ]);

        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image, 
        ]);

            return response()->json([
                'user'=>$user,
                'message'=>'User registered successfully'
            ], 201);
        }catch(e){
            return response()->json([
                'user'=> null,
                'message'=>'error occured'
            ], 500);
        }
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // gen@gmail.com
        // 12345678
        $user = User::where('email',$request->email)->first();
        Log::info('Login attempt:', ['email' => $request->email, 'password' => $request->password]);
        Log::info('Login attempt answer:', ['email' => $user->email, 'password' => $user->password]);

        // return response()->json(['message'=>$request->email], 401);
        if(!$user){
            return response()->json(['message'=>"user not found"], 401);
        }
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message'=>'Invalid credentials'], 401);
        }
        // $token = $user->createToken('Personal Token')->plainTextToken;

        $token = $user->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'user_id' => $user->id,  // Kirimkan user_id
            'username' => $user->username,
            'detail' => $user,
            'token' => $token
        ]);
    }

    public function index()
    {
        try{
            $data = User::all();
            return response()->json([
                "status" => true,
                "message" => "Get Successful",
                "data" => $data,
            ],200);

        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage(),
            ],400);
        }
    }

    public function show($id)
    {
        try{
            $data = User::find($id);
            return response()->json([
                "status" => true,
                "message" => "Get Successful",
                "data" => $data,
            ],200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage(),
            ],400);
        }
    }

    public function update(Request $request, $id)
    {
        try{
            $data = User::findOrFail($id);

            // if($data->id !== Auth::id()){
            //     return response()->json(['message' => 'dilarang masuk']);
            // }
            $validData = $request->validate([
                'username' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
            ]);

            $data->update($validData);
            return response()->json([
                "status" => true,
                "message" => "Update Data Successful",
                "data" => $data,
            ],200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage(),
            ],400);
        }
    }
    public function updateProfilePicture(Request $request, $id)
    {
        try{
            $data = User::findOrFail($id);

            // if($data->id !== Auth::id()){
            //     return response()->json(['message' => 'dilarang masuk']);
            // }

            $validData = $request->validate([
                'image' => 'nullable|string',
            ]);
            
            $data->update($validData);
            
            return response()->json([
                "status" => true,
                "message" => "Update Successful",
                "data" => $data,
            ],200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage(),
            ],400);
        }
    }

    public function destroy($id)
    {
        try{
            $data = User::find($id);
            if($data->id !== Auth::id()){
                return response()->json(['message' => 'dilarang masuk']);
            }
            $data->delete();
            return response()->json([
                "status" => true,
                "message" => "Delete Successful",
                "data" => $data,
            ],200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage(),
            ],400);
        }
    }
    public function search($nama)
    {
        try{
            // Menggunakan where untuk mencari berdasarkan nama
            $data = User::where('nama_User', 'like', '%'.$nama.'%')->get();

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => false,
                    "message" => "User not found",
                    "data" => [],
                ], 404);
            }

            return response()->json([
                "status" => true,
                "message" => "Get Successful",
                "data" => $data,
            ], 200);
        }catch(Exception $e){
            return response()->json([
                "status" => false,
                "message" => "Something went wrong",
                "data" => $e->getMessage(),
            ], 400);
        }
    }

}
