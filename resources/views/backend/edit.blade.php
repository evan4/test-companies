@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('backend.aside')
        </div>
        <div class="col-md-8">
            <h1 class="text-center">{{ $company->name }}</h1>
            <div class="alert collapse" role="alert" id="alert-company"></div>
            
            <form action="" 
                method="post" 
                id="company-update">
                    @csrf
                    <div class="form-group">
                        <label for="name">Название</label>
                        <input type="text" class="form-control" 
                            id="name" value="{{$company->name}}"
                            placeholder="Введите название">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" 
                            id="email" value="{{$company->email}}"
                            placeholder="Введите email">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" class="form-control" 
                        id="description" cols="30" rows="3">{{$company->description}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Созранить</button>
            </form>
        </div>
    </div>
</div>
@endsection
