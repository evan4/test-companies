@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('backend.aside')
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Панель управления</div>

                <div class="card-body">
                   <h1 class="text-center">{{ $company->name }}</h1> 
                </div>
            </div>
            
            <p>Число сотрудников {{$company->employees->count()}}</p>
            <div class="mb-2">
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
        </div>
    </div>
</div>
@endsection
