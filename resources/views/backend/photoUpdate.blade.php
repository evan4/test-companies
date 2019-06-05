@extends('layouts.admin')

@section('content')

<h1 class="text-center">{{ $company->name }}</h1>

@if($company->image)
    <img class="img-thumbnail company-image"
        id="company-image"
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
<div class="loading-photo collapse"><i class="fa fa-spinner fa-spin fa-3x fa-fw"></i> Идет загрузка фото</div>
@endsection
