@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Список компаний</h1>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Название</th>
            <th scope="col">Email</th>
            <th scope="col">image</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
                @foreach($companies as $company)
                <tr>
                    <td class="w-25">
                        <a href="{{ $company->url }}">{{ $company->name }}</a>
                    </td>
                    <td class="w-30">{{ $company->email }}</td>
                    <td class="w-20">{{ $company->image }}</td>
                    <td class="w-25">{{ str_limit( $company->description, $limit = 50, $end = '...') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
