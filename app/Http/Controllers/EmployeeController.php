<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Support\Facades\File;
use App\Models\Department;

class EmployeeController extends Controller
{
    //CONTROLLER FOR INDEX PAGE
    public function index(){
// data from database
        $data['employees']=Employee::orderBy('id','DESC')->get();
       return view('employees.index',$data);
    }

    public function create(){
           $departments = Department::all();
        return view('employees.create',compact('departments'));
    }

    // CONTROLLER FOR SAVE AND RETRIVE DATA

    //for required function
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'department'=>'required',
            'image'=>'sometimes| image: gif,png,jpeg,jpg'
        ]);
         $selectedDepartmentId = $request->input('department');

        if($validator->passes()){
            //Save Data Here
            $employee=new Employee();
            $employee->name=$request->name;
            $employee->email=$request->email;
            $employee->department_id=$request->department;
             $employee->address=$request->address;
             $employee->save();

             //upload image here
             if($request->image){
                $ext=$request->image->getClientOriginalExtension();    
                $newFileName=time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);//this will save a file in a folder
                         $employee->image=$newFileName;
                                  $employee->save();
             }
            // Showing message 
             return redirect()->route('employees.index')->with('success','Employee Added Successfully.');
        }
        else{
            //return with errors
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }
    // CONTROLLER FOR EDIT
    public function edit($id){
        $employee=Employee::find($id);  

    $departments = Department::all(); // Retrieve departments

       return view('employees.edit', compact('employee', 'departments'));
}
      
    

    // UPDATE CONTROLLER
    public function update($id, Request $request){

          
        $validator=Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'department'=>'required',
            'image'=>'sometimes| image: gif,png,jpeg,jpg'
        ]);

        if($validator->passes()){
            //Save Data Here
            $employee= Employee:: find($id);
            $employee->name=$request->name;
            $employee->email=$request->email;
             $employee->department_id=$request->department;
             $employee->address=$request->address;
             $employee->update();

             //upload image here
             if($request->image){

                $oldImage=$employee->image;
                $ext=$request->image->getClientOriginalExtension();    
                $newFileName=time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);//this will save a file in a folder
                $employee->image=$newFileName;
               $employee->save();
                  
                File::delete(public_path().'/uploads/employees/'.$oldImage);// delete the old image
             }
            // Showing message 
             return redirect()->route('employees.index')->with('success','Employee Updated Successfully.');
        }
        else{
            //return with errors
            return redirect()->route('employees.edit',$id)->withErrors($validator)->withInput();
        }
    }
    //   DELETE THE DATA
    public function destroy($id, Request $request){
        $employee=Employee::findOrFail($id);
        File::delete(public_path().'/uploads/employees/'.$employee->image);
        $employee->delete();
        return redirect()->route('employees.index')->with('success','Employee Deleted Successfully.');
    }



 
    // public function add_employee($id)
    // {
    //     $department = Department::find($id);

    //     if ($department) {
    //         $employee = new Employee();
    //         $employee->name = 'bli';
    //         $employee->email = 'aa@gmail.com';
    //         $employee->address = 'aaaa';

    //         // Associate the employee with the department
    //         $department->employees()->save($employee);

    //         // Return a response or redirect as needed
    //     } else {
    //         // Handle if the department with the given ID is not found
    //     }
    // }
}
