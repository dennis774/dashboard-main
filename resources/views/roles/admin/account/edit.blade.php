@extends('general.index-two') @section('content')

<div class="container account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                <a href="{{ url('/account') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8">
                @if ($user->role == 'owner')
                <h3 style="">Edit My Account</h3>
                @else
                <h3 style="">Edit User Account</h3>
                @endif
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="container">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{url('/account', $user->id)}}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 pt-5 pb-5">
                                    <img src="{{ asset('user_images/' . $user->user_image) }}" alt="User Image" width="100">
                                    {{-- <img src="https://via.placeholder.com/80" alt="User Image" class="user-image" /> --}}
                                    <div class="form-group mb-3">
                                        <label for="user_image">User Image</label>
                                        <input type="file" class="form-control" name="user_image" value="{{ $user->user_image }}">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <p id="roleDisplay2">
                                                                @if ($user->role == 'owner') Business owner @elseif ($user->role == 'general') Finance Officer @elseif ($user->role == 'kuwago') Operational Manager
                                                                @elseif($user->role=='uddesign') Operational Manager @endif
                                                            </p>
                                                        </div>

                                                        <div class="col-lg-2"></div>

                                                        <div class="col-lg-5">
                                                            <button type="submit" class="btn btn-warning">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="username" class="form-label"></label>
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Username" required />
                                            </div>

                                            <div class="col-lg-12">
                                                <label for="description" class="form-label"></label>
                                                <input type="text" class="form-control" name="description" value="{{ $user->description }}" placeholder="Add Description" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Access</p>
                                    <div class="dropdown">
                                        @if ($user->role == 'owner')
                                        <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                            <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                                        </select>
                                        @else
                                        <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                            <option value="general" {{ $user->role == 'general' ? 'selected' : '' }}>General</option>
                                            <option value="kuwago" {{ $user->role == 'kuwago' ? 'selected' : '' }}>Kuwago</option>
                                            <option value="uddesign" {{ $user->role == 'uddesign' ? 'selected' : '' }}>UdDesign</option>
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <p>Role</p>
                                    <div class="dropdown">
                                        <p id="roleDisplay">
                                            @if ($user->role == 'owner') Business owner @elseif ($user->role == 'general') Finance Officer @elseif ($user->role == 'kuwago') Operational Manager @elseif($user->role =='uddesign') Operational
                                            Manager @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Profile</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="">
                                        <label for="first_name" class="form-label">Firstname: </label>
                                        <input type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" placeholder="First Name" required />
                                    </div>
                                    <div class="">
                                        <label for="last_name" class="form-label">Lastname: </label>
                                        <input type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" placeholder="Last Name" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <label for="middle_name" class="form-label">Initial: </label>
                                        <input type="text" class="form-control" name="initial" value="{{ $user->initial }}" placeholder="Initial" required />
                                    </div>
                                    <div class="">
                                        <label for="suffix" class="form-label">Suffix: </label>
                                        <input type="text" class="form-control" name="suffix" value="{{ $user->suffix }}" placeholder="Suffix" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Contact</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <label for="email" class="form-label pe-3">Email: </label>
                                        <input type="text" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email" required />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="phone_number" class="form-label pe-2">Phone: </label>
                                        <input type="text" class="form-control" name="phone_number" value="{{ $user->phone_number }}" placeholder="Enter Phone Number" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">
                                    @if ($user->role == 'owner')
                                    <button class="btn btn-light">
                                        <a href="/account/password">
                                            Change Password
                                        </a>
                                    </button>
                                    @else @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
</div>

<script>
    function syncRole() {
        var roleSelect = document.getElementById("roleSelect");
        var roleDisplay2 = document.getElementById("roleDisplay2");
        var roleDisplay = document.getElementById("roleDisplay");
        var selectedRole = roleSelect.value;

        var roleText = "";
        switch (selectedRole) {
            case "owner":
                roleText = "Business owner";
                break;
            case "general":
                roleText = "Finance Officer";
                break;
            case "kuwago":
            case "uddesign":
                roleText = "Operational Manager";
                break;
        }

        roleDisplay2.innerText = roleText;
        roleDisplay.innerText = roleText;
    }
</script>
@endsection
