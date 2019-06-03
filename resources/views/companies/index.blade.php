@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Список компаний</h1>
    <table class="table table-hover">
        <thead>
            <tr>
            <th>Название</th>
            <th>Email</th>
            <th>image</th>
            <th>Description</th>
            <td>Число сотрудников</td>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
            <tr>
                <td class="w-25">
                    <a href="{{ $company->url }}">{{ $company->name }}</a>
                </td>
                <td class="w-20">{{ $company->email }}</td>
                <td class="w-20">{{ $company->image }}</td>
                <td class="w-25">{{ str_limit( $company->description, $limit = 50, $end = '...') }}</td>
                <td class="w-10">{{ $company->employees->count() }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $companies->links() }}
    
</div>
@endsection
