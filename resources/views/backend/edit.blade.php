@extends('layouts.admin')

@section('content')

<h1 class="text-center">Обновить данные</h1>
<p>{{ $company->name }}</p>
<div class="alert collapse" role="alert" id="alert-company"></div>

<form action="" 
    method="post" 
    id="company-update">
        @csrf
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" class="form-control" 
                name="name" 
                id="name" value="{{$company->name}}"
                placeholder="Введите название" required>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" 
                name="email" 
                id="email" value="{{$company->email}}"
                placeholder="Введите email" required>
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" class="form-control" 
            id="description" cols="30" rows="3" required>{{$company->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Созранить</button>
</form>
@endsection
