<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;
class TicketController extends Controller
{
    public function index() {
        $allTiket = Ticket::all();
        return response()->json($allTiket);
    }
}
