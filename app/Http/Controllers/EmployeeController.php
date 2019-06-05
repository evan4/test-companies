<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Position;

use App\Http\Requests\EmployeeUpdateRequest;

class EmployeeController extends Controller
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

    public function create()
    {   
        $positions = Position::all();

        return view('backend.employees.create', compact('positions'));
    }

    public function store(EmployeeUpdateRequest $request)
    {
        Employee::create(array_merge($request->all(), ['company_id' => \Auth::id()]));

        return redirect('/admin/employees')->with('message', 'Новый сотрудник был успешно добавлен!');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $positions = Position::all();

        return view('backend.employees.edit', compact('employee', 'positions'));
    }

    public function update(EmployeeUpdateRequest $request)
    {
        $data = $request->all();
        $employee = Employee::findOrFail((int)$data['id']);
    
        $employee->update($data);

        return redirect('/admin/employees')->with('message', 'Данные о сотруднике успешно обновлены!');
    }

    public function destroy($id)
    {
        $employee = Employee::findOrFail((int)$id);
        
        $employee->delete();

        return redirect('/admin/employees')->with('message', 'Пользователь был успешно удален!');
    }
}
