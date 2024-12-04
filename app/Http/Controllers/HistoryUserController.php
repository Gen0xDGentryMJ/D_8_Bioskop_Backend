<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\HistoryUser;
use Exception;
use Illuminate\Http\Request;

class HistoryUserController extends Controller
{
    public function index()
    {
        try{
            $data = HistoryUser::all();
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
            $data = HistoryUser::create($request->all());
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
            $data = HistoryUser::find($id);
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
            $data = HistoryUser::find($id);
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
            $data = HistoryUser::find($id);
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
            $data = HistoryUser::find($id);

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => false,
                    "message" => "HistoryUser not found",
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
