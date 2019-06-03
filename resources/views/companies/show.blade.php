@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1 class="text-center">{{ $company->name }}</h1>
    <p>Число сотрудников {{$company->employees->count()}}</p>
    <div class="mb-2">
        Email: <a href="mailto:{{$company->email}}">{{$company->email}}</a>
        @if($company->image)
            <img class="float-right img-thumbnail"
                src="{{$company->image}}" 
                alt="{{ $company->name }}">
        @endif
    </div>
    <div>
        <p>Описание</p>
        {{$company->description}}
    </div>
    <h2 class="mt-2">Список сотрудников</h2>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Имя</th>
            <th scope="col">Должность</th>
            <th scope="col">Зарплата</th>
            </tr>
        </thead>
        <tbody>
                @foreach($emploees as $emploee)
                <tr>
                    <td class="w-33">{{ $emploee->name }}</td>
                    <td class="w-33">{{ $emploee->position->name }}</td>
                    <td class="w-33">${{ $emploee->salary }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $emploees->links() }}

    @auth
        @if($comments)
        <h3>Комментарии</h3>
        <ul>
            @foreach($comments as $comment)
            <li class="mt-2">
                <p>{{$comment->company->name}}</p>
                {{$comment->body}}
            </li>
            @endforeach
        </ul>
        @endif
    @endguest
</div>
@endsection
