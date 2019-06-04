<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Comment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company = Company::find(\Auth::id());

        return view('home', compact('company'));
    }

    public function editCompany(Company $company)
    {
        $company = Company::find(\Auth::id());
        
        return view('backend.edit', compact('company'));
    }

    public function updateCompany()
    {
        
    }

    public function showEmployees()
    {
        $company = Company::find(\Auth::id());

        $emploees = Employee::with('position')->where('company_id', $company->id)
            ->latest()->paginate(5);

        return view('backend.showEmployees', compact('company', 'emploees') );
    }

    public function showComments()
    {
        $company = Company::find(\Auth::id());

        $comments = Comment::with('company')->where('company_id', $company->id)
            ->latest()->paginate(5);

        return view('backend.showComments', compact('company', 'comments') );
    }

}
