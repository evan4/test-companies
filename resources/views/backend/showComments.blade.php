@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('backend.aside')
        </div>
        <div class="col-md-8">
        <h1 class="text-center">{{ $company->name }}</h1>
        
        <h2 class="mt-2">Отзывы о компании</h2>
       
        <ul class="list-group">
            @foreach($comments as $comment)
            <li class="list-group-item">
                <p>{{$comment->company->name}}</p>
                {{$comment->body}}
            </li>
            @endforeach
        </ul>
        {{ $comments->links() }}
    </div>
</div>
@endsection