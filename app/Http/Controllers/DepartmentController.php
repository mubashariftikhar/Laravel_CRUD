<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee;
 

class DepartmentController extends Controller
{
public function add_department()
    {
      $department=new Department();
      $department->name='hhhhh';
      $department->save();
    }
}
    // public function getEmployeesByDepartment(Request $request)
    // {
    //     $departmentName = $request->input('department_name'); // Retrieve department name from request
    //     $department = Department::where('name', $departmentName)->first();

    //     if ($department) {
    //         $employees = $department->employees;

    //         // You can pass this data to your view or perform further operations as needed
    //         return view('employees.index', compact('employees'));
    //     } else {
    //         // Handle when the department is not found
    //         return redirect()->back()->with('error', 'Department not found');
    //     }
    // }