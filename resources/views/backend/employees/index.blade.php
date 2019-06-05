@extends('layouts.admin')

@section('content')
@include('backend.partials.message') 
<h1 class="text-center">{{ $company->name }}</h1>

<h2 class="mt-2">Список сотрудников</h2>
<div class="pull-left mb-2">
    <a href="{{ url('/admin/employee-create') }}" class="btn btn-primary">Добавить сотрудника <i class="fa fa-plus"></i></a>
</div>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Имя</th>
            <th>Должность</th>
            <th>Зарплата</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
            @foreach($emploees as $emploee)
            <tr>
                <td class="w-33">
                    <a href="/admin/employee/{{ $emploee->id }}">{{ $emploee->name }}</a>
                </td>
                <td class="w-33">{{ $emploee->position->name }}</td>
                <td class="w-33">${{ $emploee->salary }}</td>
                <td>
                    <form action="{{ url('admin/employee-delete', ['id' => $emploee->id]) }}"
                        class="text-center"
                        method="post">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-sm  btn-danger">
                            <i class="fa fa-times"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $emploees->links() }}
   
@endsection
