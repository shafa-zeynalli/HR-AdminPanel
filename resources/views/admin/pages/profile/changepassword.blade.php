@extends('layout.admin')

@section('content')
    <h2>Change Password</h2>
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
                action="{{route('profile-password.update')}}"
                method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">

                        <div class="tab-pane fade active show">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" placeholder="email" name="email"
                                       value="{{ $user->email}}"
                                       class="form-control" id="email">
                                @error("email")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="c_password">Current Password</label>
                                <input type="text" placeholder="Current Password..." name="c_password"
                                       class="form-control" id="c_password">
                                @error("c_password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="n_password">New Password</label>
                                <input type="text" placeholder="New Password" name="n_password"
                                       class="form-control" id="n_password">
                                @error("n_password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="a_password">Retype The Password</label>
                                <input type="text" placeholder="Again Password" name="a_password"
                                       class="form-control" id="a_password">
                                @error("a_password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <button class="btn btn-success">Change Password</button>
            </form>
        </div>
    </div>

@endsection
