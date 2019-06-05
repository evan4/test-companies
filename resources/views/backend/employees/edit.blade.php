@extends('layouts.admin')

@section('content')

<h1 class="text-center">Обновить данные</h1>

<div class="alert collapse" role="alert" id="alert-company"></div>

<form action="{{ url('admin/employee-update') }}" 
    method="post" 
    id="employee-update">
        @csrf
        <input type="hidden" name="id" value="{{$employee->id}}"></input>
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" 
                name="name" 
                id="name" value="{{$employee->name}}"
                placeholder="Введите имя" required>
        </div>
        <div class="form-group">
            <label for="salary">Зарплата</label>
            <input type="number" 
                min="100"
                class="form-control" 
                name="salary" 
                id="salary" 
                value="{{$employee->salary}}"
                placeholder="Зарплата" required>
        </div>
        <div class="form-group">
                <label for="position">Должность</label>
                <select name="position_id" 
                    class="form-control" 
                    id="position">
                    @foreach($positions as $position)
                    <option value="{{$position->id}}"
                        @if($position->id === $employee->position_id)
                        selected
                        @endif
                        >{{$position->name}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Созранить</button>
</form>
@endsection
