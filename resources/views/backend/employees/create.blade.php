@extends('layouts.admin')

@section('content')

<h1 class="text-center">Новый сотрудник</h1>

<div class="alert collapse" role="alert" id="alert-company"></div>

<form action="{{ url('admin/employee-store') }}" 
    method="post" 
    id="employee-update">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" 
                name="name" 
                id="name" 
                placeholder="Введите имя" required>
        </div>
        <div class="form-group">
            <label for="salary">Зарплата</label>
            <input type="number" 
                min="100"
                class="form-control" 
                name="salary" 
                id="salary"
                placeholder="Зарплата" required>
        </div>
        <div class="form-group">
                <label for="position">Должность</label>
                <select name="position_id" 
                    class="form-control" 
                    id="position">
                    @foreach($positions as $position)
                    <option value="{{$position->id}}">{{$position->name}}</option>
                    @endforeach
                </select>
            </div>
        <button type="submit" class="btn btn-primary">Созранить</button>
</form>
@endsection
