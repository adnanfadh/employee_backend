<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PositionResource;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index(){
        $position = Position::all();

        return response()->json([
            'status' => true,
            'data' => PositionResource::collection($position)
        ]);
    }
}
