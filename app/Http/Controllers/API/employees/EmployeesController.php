<?php

namespace App\Http\Controllers\API\employees;

use App\Http\Controllers\Controller;
use App\Models\Employees\Employee;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class EmployeesController extends Controller
{
    /**
     * Get employee details by computer number
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function getEmployeeByComputerNumber(Request $request): JsonResponse
    {
        $request->validate([
            'computer_number' => 'required|integer'
        ]);

        $employee = Employee::where('computer_number', $request->computer_number)->first();

        if (!$employee) {
            return response()->json([

             
                'data' => null
            ], 404);
        }

        return response()->json([


            'data' => $employee
        ]);
    }
}
