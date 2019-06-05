@extends('layouts.admin')

@section('content')

<div class="card">
    <div class="card-header">Панель управления</div>

    <div class="card-body">
        <h1 class="text-center">{{ $company->name }}</h1> 
    </div>
</div>

<p>Число сотрудников {{$company->employees->count()}}</p>
<div class="mb-2 clearfix">
    Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a>
    @if($company->image)
        <img class="float-right img-thumbnail company-image"
            src="{{$company->image_url}}" 
            alt="{{ $company->name }}">
    @endif
</div>
<div>
    <p>Описание</p>
    {{$company->description}}
</div>
     
@endsection
