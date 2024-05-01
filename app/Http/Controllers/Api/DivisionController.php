<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DivisionResource;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index(){
        $division = Division::all();

        return response()->json([
            'status' => true,
            'data' => DivisionResource::collection($division)
        ]);
    }
}
