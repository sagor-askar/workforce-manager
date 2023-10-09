<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Employee;
use File;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches = Branch::all();
        $employees = Employee::with('branch')->get();
        $search = null;
        return view('employee.index',compact('employees','branches','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'employee_id' => 'required|unique:employees|max:255',
            'nid' => 'required|unique:employees|max:255',
            'dob' => 'required',
            'designation' => 'required',
            'contact' => 'required|min:11|max:11',
            'branch_id' => 'required',
            'blood_group' => 'required',
            'joining_date' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = $request->all();
        
        $name =  $request->name;
        $ex_name =  str_ireplace('.',' ', ucwords(strtolower($name)) );
        $name =  ucwords( $ex_name,'|,.');
        $data['name'] = ucwords(strtolower($name));

        $data['email'] = "info@jakas-bd.org";
        $data['emergency_contact'] = "+8809643216293";
        $data['joining_date'] =  date("Y-m-d", strtotime($request->joining_date));
        $data['dob'] = date("Y-m-d", strtotime($request->dob));
        if ($request->image){
            $file =$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.' . $extension;
            $file->move(public_path('images/'), $filename);
           // $file->storeAs('public/images', $filename);
            $data['image']= $filename;
        }
        $employee = Employee::create($data);
        return back()->with([
            'message' => 'Data Saved Successfully!',
            'status' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $employee = Employee::with('branch')->find($id);
        return view('employee.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        $branches = Branch::all();
        return view('employee.edit',compact('employee','branches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $employee = Employee::find($id);

        $request->validate([
            'name' => 'required',
            'designation' => 'required',
             'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $data = $request->all();
        $name =  $request->name;
        $ex_name =  str_ireplace('.',' ', ucwords(strtolower($name)) );
        $name =  ucwords( $ex_name,'|,.');
        $data['name'] = ucwords(strtolower($name));

        if ($request->hasFile('image')) {
            $image_path = public_path("images/{$employee->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.' . $extension;
            $file->move(public_path('images/'), $filename);
            $data['image']= $filename;
            $employee->update($data);
        }else{
            $employee->update($data);
        }
        return redirect()->route('employee.index')->with('success','Employee updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if ($employee->image) {
            $image_path = public_path("images/{$employee->image}");
            if (File::exists($image_path)) {
                unlink($image_path);
            }
        }
        $employee->delete();
        return redirect()->route('employee.index')->with('success','Employee Deleted Successfully');
    }


    public function employeeSearch( Request $request)
    {

        $branches = Branch::all();
        $employees = Employee::with('branch')->where('branch_id',$request->branch_id)->get();
        $search = 1;
        return view('employee.index',compact('employees','branches','search'));
    }
}
