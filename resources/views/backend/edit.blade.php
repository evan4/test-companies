@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('backend.aside')
        </div>
        <div class="col-md-8">
            <h1 class="text-center">{{ $company->name }}</h1>

            <form action="" 
                method="post" class="box-body" 
                id="post-form">
                    @csrf

            </form>
        </div>
    </div>
</div>
@endsection
