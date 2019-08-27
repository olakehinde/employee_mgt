<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
        return view('companies.index', ['companies' => $companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        //validate request
        $validation = $request->validate([
             'name' => 'required|max:255',
             'address' => 'required',
             'email' => 'required|email|unique:companies',
             'sector' => 'string|nullable',
         ]);

        //save data to db
        $company = Company::create($validation);
        // dd($request->all());
        
        //redirect to index with flash message
        if ($company) {
            return redirect()->route('companies.index')->with('success', 'Company is successfully created');
        }
        else {
            return redirect()->back()->with('error', 'Failed to create Company');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        // $findcompany = Company::findOrFail($company->id); 
        // dd($findcompany);
        if ($company) {
            try {
                return view('companies.show', compact('company'));
            } catch (Exception $e) {
                return redirect()->back()->with('error', $e);
            }
        }
        return redirect()->back()->with('error', 'Cannot find Company details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        // dd($request->id);
        $id = $request->id;
        //validate request
        $validation = $request->validate([
             'name' => 'required|max:255',
             'address' => 'required',
             'email' => 'required|email',
             'sector' => 'string',
         ]);
        // dd($validation);

        //save data to db
        $update = Company::where('id', $id)->update($validation);
        // dd($request->all());
        
        //redirect to index with flash message
        if ($update) {
            return redirect()->route('companies.index')->with('success', 'Company detail successfully Edited');
        }
        else {
            return redirect()->back()->with('error', 'Failed to edit Company detail');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        // dd($company);
        $deleted = $company->delete();
        if ($deleted) {
            return view('companies.index')->with('message', 'Company deleted Successfully');
        }
        return redirect()->back()->with('error', 'Operation failed!!!');
        
    }
}
