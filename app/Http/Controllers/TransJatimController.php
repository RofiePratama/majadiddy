<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransJatim;
use Illuminate\Support\Facades\DB;

class TransJatimController extends Controller
{
    //
    public function index() {
        $route = TransJatim::all();
        return response()->json([
            'status'=>'success',
            'message'=>'success retrieved data',
            'data'=>$route
        ],200);
    }

    public function show($id) {
        $route_id = $id;

        $route = TransJatim::with('route_details')
            ->where('id', $route_id)
            ->first();

        if (!$route) {
            return response()->json([
                'status'=>'error',
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Success retrieved data',
            'data' => [
                'route_name'=>$route->route_name,
                'start_point'=>$route->start_point,
                'end_point'=>$route->end_point,
                'ticket_price'=>$route->price,
                'route' => $route->route_details
            ]
        ],200);
    }
}
