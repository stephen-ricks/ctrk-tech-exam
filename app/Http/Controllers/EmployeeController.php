<?php

namespace App\Http\Controllers;

use App\Model\Employee;
use App\Validation\EmployeeValidator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public $perPage = 10;

    public function getAll()    
    {
        $employees = Employee::paginate($this->perPage);
        
        return response()->json($employees->toArray());
    }

    public function findById($id)
    {
        $employee = Employee::find($id);

        if (empty($employee)) {
            return response()->json(['error' => 'Employee not found.'], Response::HTTP_NOT_FOUND);
        }   

        return response()->json(['data' => $employee]);
    }

    public function create(Request $request)
    {
        $validation = Validator::make($request->all(), (new EmployeeValidator)->getRules());

        if ($validation->fails()) {
            $error = $validation->errors()->first();

            return response()->json(compact('error'), 406);
        }

        $employee = Employee::create($request->all());

        return response()->json($employee, Response::HTTP_CREATED);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);

        if (empty($employee)) {
            return response()->json(['error' => 'Employee not found.'], Response::HTTP_NOT_FOUND);
        }

        $validation = Validator::make($request->all(), (new EmployeeValidator)->getUpdateRules());

        if ($validation->fails()) {
            $error = $validation->errors()->first();

            return response()->json(compact('error'), 406);
        }

        $employee->update(array_except($request->all(), 'employee_id'));

        return response()->json(['data' => $employee], Response::HTTP_ACCEPTED);
    }

    public function delete($id)
    {
        $employee = Employee::find($id);

        if (! empty($employee)) {
            $employee->delete();

            return response()->json(['data' => ['employee_id' => $id]], Response::HTTP_ACCEPTED);
        } else {
            return response()->json(['data' => 'Employee not found.'], Response::HTTP_NOT_FOUND);
        }
    }
}
