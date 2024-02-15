@extends('layout.admin')

@section('content')
    <h2>My Profile</h2>
    <div class="card">
        <div class="card-body">
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
            <form
                action="{{route('profile.update')}}"
                method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">

                        <div class="tab-pane fade active show">

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" placeholder="First Name" name="first_name"
                                       value="{{ $user->first_name}}"
                                       class="form-control" id="first_name">
                                @error("first_name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" placeholder="Last Name" name="last_name"
                                       value="{{ $user->last_name}}"
                                       class="form-control" id="title">
                                @error("last_name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" placeholder="Address" name="address"
                                       value="{{$user->address}}"
                                       class="form-control" id="title">
                                @error("address")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" placeholder="Position" name="position"
                                       value="{{$user->position}}"
                                       class="form-control" id="title">
                                @error("position")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="btn btn-success">Edit Profile</button>
            </form>
        </div>
    </div>

@endsection
