@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            @include('backend.aside')
        </div>
        <div class="col-md-8">
            <h1 class="text-center">{{ $company->name }}</h1>

            @if($company->image)
                <img class="float-right img-thumbnail"
                    src="{{$company->image_url}}" 
                    alt="{{ $company->name }}">
            @endif

            <form action="" enctype="multipart/form-data"
                method="post"
                id="post-form">
                    @csrf
                    <div class="form-group">
                        <label for="image">Изображение</label>
                        <input type="file" class="form-control" 
                            name="image" 
                            id="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Созранить</button>
            </form>
        </div>
    </div>
</div>
@endsection
