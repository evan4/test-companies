@extends('layouts.admin')

@section('content')

<h1 class="text-center">{{ $company->name }}</h1>

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
                <td class="w-33">
                    <a href="">{{ $emploee->name }}</a>
                </td>
                <td class="w-33">{{ $emploee->position->name }}</td>
                <td class="w-33">${{ $emploee->salary }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

{{ $emploees->links() }}
   
@endsection
