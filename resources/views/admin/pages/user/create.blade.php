@extends('layout.admin')

@section('content')
    <h2>Add User Item</h2>
    <div class="card">
        <div class="card-body">
            <form
                action="{{route('users.store')}}"
                method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">

                        <div class="tab-pane fade active show">

                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" placeholder="First Name" name="first_name"
                                       value="{{old('first_name')}}"
                                       class="form-control" id="first_name">
                                @error("first_name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" placeholder="Last Name" name="last_name"
                                       value="{{old('last_name')}}"
                                       class="form-control" id="title">
                                @error("last_name")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" placeholder="Address" name="address"
                                       value="{{old('address')}}"
                                       class="form-control" id="title">
                                @error("address")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="position">Position</label>
                                <input type="text" placeholder="Position" name="position"
                                       value="{{old('position')}}"
                                       class="form-control" id="title">
                                @error("position")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" placeholder="Email" name="email"
                                       value="{{old('email')}}"
                                       class="form-control" id="title">
                                @error("email")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="form-group password-container">
                                <label for="password">Password</label>
                                <input type="password" placeholder="Password" name="password"
                                       value="{{old('password')}}"
                                       class="form-control" id="password-input">
                                <span class="password-toggle" id="password-toggle">👁️</span>

                                @error("password")
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>
                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>

    <script>
        const passwordInput = document.getElementById('password-input');
        const passwordToggle = document.getElementById('password-toggle');

        passwordToggle.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            passwordToggle.textContent = type === 'password' ? '👁️' : '👁️‍🗨️';
        });
    </script>

@endsection
