<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Employee;
use App\Comment;

class CompanyController extends Controller
{
     /**
     * Display a listing of the companies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::all();
       
        return view('companies.index', compact('companies'));
    }

       /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $company_id = $company->id;

        $emploees = Employee::with('position')->where('company_id', $company_id)->get();

        $comments = Comment::with('company')->where('company_id', $company_id)
            ->latest()->get();

        return view('companies.show', compact('company', 'emploees', 'comments') );
    }

}
