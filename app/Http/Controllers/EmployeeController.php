<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        return view('employees.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create', ['companies' => Company::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validation = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email|unique:employees',
            'company_id' => 'required',
        ]);

        // dd($validation);
        $create = Employee::create($validation);
        if ($create) {
            return redirect()->route('employees.index')->with('success', 'Employee created successfully');
        }
        else {
            return redirect()->back()->with('error', 'Something went wrong, try again');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('employees.show')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employees.edit')->with('employee', $employee)
                                     ->with('companies', Company::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //validate request
        $validation = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required',
            'email' => 'required|email',
            'company_id' => 'required',
        ]);
        //update db record
        $update = Employee::where('id', $request->id)->update($validation);
        // redirect with message
        if($update) {
            return redirect()->route('employees.index')->with('success', 'Employee record updated successfully');
        }
        return redirect()->back()->with('error', "Oops...Something went wrong while trying to update record. Try again");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $deleted = $employee->delete();

        if ($deleted) {
            return redirect()->route('employees.index')->with('success', 'Employee record deleted successfully');
        }
        return redirect()->back()->with('error', "Oops...Something went wrong while trying to delete record. Try again");
    }
}
