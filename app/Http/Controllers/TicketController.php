<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    public function index()
    {
        try{
            $data = Ticket::all();
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
            $data = Ticket::create($request->all());
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
            $data = Ticket::find($id);
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
            $data = Ticket::find($id);
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
            $data = Ticket::find($id);
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
            $data = Ticket::find($id);

            if ($data->isEmpty()) {
                return response()->json([
                    "status" => false,
                    "message" => "Ticket not found",
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
