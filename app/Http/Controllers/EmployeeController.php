<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        
        $employee->delete();

        return redirect('/admin/employees')->with('message', 'Пользователь был успешно удален!');
    }
}
