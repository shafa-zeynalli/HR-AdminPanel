@extends('layout.admin')

@section('content')
    <h2>Edit User Item</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{route('roles.update')}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        <div class="tab-pane fade active show">
                            <div class="form-group">
                                <label for="first_name">Role Name</label>
                                <input type="text" placeholder="First Name" name="first_name" disabled
                                       value="{{ $role->name}}" class="form-control">
                            </div>
{{--                            @dd($role->permissions)--}}
                            <div class="form-group">
                                @foreach($permissions as $permission)
                                    <div>
                                        <input type="checkbox" name="permissions[]" value="{{ $permission->name }}" {{ $role->permissions->contains('id',$permission->id) ? 'checked' : '' }}>
                                        <label>{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                                    @error("permissions")
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="role_id" value="{{$role->id}}">
                <button class="btn btn-success">Edit</button>
            </form>
        </div>
    </div>


@endsection
