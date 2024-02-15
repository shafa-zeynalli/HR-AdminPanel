@extends('layout.admin')

@section('content')
    <h2>My Profile</h2>

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger mt-3">
            {{ session('error') }}
        </div>
    @endif

    <table class="table mt-3">
        <thead>
        <tr>
            <th>#ID</th>
            <th>Name</th>
            <th>Permissions</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
        <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
            <td>
                @foreach($role->permissions as $item)
                    {{$item->name}},
                @endforeach
            </td>


            <td>
                <a href="{{ route('roles.edit',['role'=>$role->id]) }}" class="btn btn-success my-2">Edit</a>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
@endsection
