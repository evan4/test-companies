@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1 class="text-center">{{ $company->name }}</h1>

    <form action="" 
        method="post" class="box-body" 
        id="post-form">
            @csrf

    </form>

</div>
@endsection
