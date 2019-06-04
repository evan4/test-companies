@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1 class="text-center" id="company-name">{{ $company->name }}</h1>
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

        @if(Auth::id() !== $company->id)

        <h3>Новый комментарий</h3>
        <div class="alert collapse" role="alert" id="alert-result"></div>

        <form method="post" action="" id="form-comment" class="mb-2">
            @csrf
            <input type="hidden" name="company_id" value="{{$company->id}}">
            <div class="form-group">
                <label for="comment_new">Комментарий</label>
                <textarea class="form-control"
                name="body" id="comment_new" cols="30" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Опубликовать</button>
        </form>
        @endif

        @if($comments)
        <h3>Комментарии</h3>
        <ul class="list-group" id="comments-list">
            @foreach($comments as $comment)
            <li class="list-group-item">
                <p>{{$comment->company->name}}</p>
                {{$comment->body}}
            </li>
            @endforeach
        </ul>
        @endif
    @endguest
</div>
@endsection
