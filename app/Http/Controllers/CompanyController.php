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
    
        return view('companies.index',compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'logo' => ['image','mimes:jpg,png','dimensions:min_width=100,min_height=100'],
        ]);
        if ($request->logo) {
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->storeAs('public', $imageName);
        }else{
            $imageName = null;
        }

        Company::create([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $imageName,
        ]);
        $user = [
            'name' => $request->name,
            'info' => $request->website
        ];
        \Mail::to($request->email)->send(new \App\Mail\NewMail($user));
            return redirect()->route('companies.index')
                        ->with('success','Company created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('companies.edit',compact('company'));
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
        
        $request->validate([
            'name' => 'required',
            'logo' => ['image','mimes:jpg,png','dimensions:min_width=100,min_height=100'],
        ]);
        if ($request->logo) {
            $imageName = time().'.'.$request->logo->extension();  
            $request->logo->storeAs('public', $imageName);
        }else{
            $imageName = null;
        }
        $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'logo' => $imageName,
        ]);
        return redirect()->route('companies.index')
                        ->with('success','Company updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}
