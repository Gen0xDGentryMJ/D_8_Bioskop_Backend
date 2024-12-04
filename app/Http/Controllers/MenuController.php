<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        try{
            $data = Menu::all();
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

    public function store(Request $request)
    {
        try{
            $data = Menu::create($request->all());
            return response()->json([
                "status" => true,
                "message" => "Create Successful",
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
            $data = Menu::find($id);
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
            $data = Menu::find($id);
            $data->update($request->all());
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
            $data = Menu::find($id);
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
    public function search($id)
    {
        try{
            // Menggunakan where untuk mencari berdasarkan nama
            $data = Menu::find($id);

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => false,
                    "message" => "Menu not found",
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
