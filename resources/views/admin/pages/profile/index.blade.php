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
            <th>First Name</th>
            <th>Last Name</th>
            <th>Address</th>
            <th>Position</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->first_name }}</td>
            <td>{{ $user->last_name }}</td>
            <td>{{ $user->address }}</td>
            <td>{{ $user->position }}</td>
            <td>{{ $user->email }}</td>

            <td>
                <a href="{{ route('profile.edit') }}" class="btn btn-success my-2">Edit</a>
                <a href="{{ route('profile-password.edit') }}" class="btn btn-success">Change Password</a>
            </td>
        </tr>
        </tbody>
    </table>
@endsection
