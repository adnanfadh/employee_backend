<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::all();

        return response()->json([
            'status' => true,
            'data' => EmployeeResource::collection($employee)
        ]);
    }

    public function show(Employee $employee){
        return response()->json([
            'status' => true,
            'data' => new EmployeeResource($employee)
        ]);
    }

    public function store(Request $request){

        try {
            $request->validate([
                'position_id' => 'required',
                'division_id' => 'required',
                'name' => 'required',
            ]);

            $employee = new Employee();
            $employee->position_id = $request->position_id;
            $employee->division_id = $request->division_id;
            $employee->name = $request->name;
            $employee->save();

            return response()->json([
                'status' => true,
                'data' => new EmployeeResource($employee)
            ])->setStatusCode(201);

        } catch (\Throwable $th) {

            throw new HttpResponseException(response([
                'status' => false,
                'message' => $th->getMessage(),
            ]));
        }
    }

    public function update(Request $request, Employee $employee){

        try {
            $request->validate([
                'position_id' => 'required',
                'division_id' => 'required',
                'name' => 'required',
            ]);

            $employee->position_id = $request->position_id;
            $employee->division_id = $request->division_id;
            $employee->name = $request->name;
            $employee->save();

            return response()->json([
                'status' => true,
                'data' => new EmployeeResource($employee)
            ]);


        } catch (\Throwable $th) {

            throw new HttpResponseException(response([
                'status' => false,
                'message' => $th->getMessage(),
            ]));
        }
    }

    public function destroy(Employee $employee){
        try {
            //code...
            $employee->delete();

            return response()->json([
                'status' => true,
                'data' => null,
            ])->setStatusCode(200);

        } catch (\Throwable $th) {

            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ]);
        }
    }
}
