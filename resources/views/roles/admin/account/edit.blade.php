@extends('general.index-two') @section('content')

<div class="container mb-100 account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                <a href="{{ url('admin/dashboard') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8">
                <h3 style="">Edit User Account</h3>
            </div>
            <div class="col-lg-2">
                <a href="{{ url('admin/account/create') }}"><i class="fa-solid fa-plus fa-xl"></i></a>
            </div>
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
                    <form method="POST" action="{{url('admin/account', $user->id)}}" enctype="multipart/form-data">
                        @csrf @method('PUT')
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 user-image" style="height: 140px;">User Image</div>
                                <div class="col-lg-8">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5 ps-0 border-black-border d-flex justify-content-center user-position">
                                                            {{-- <p id="roleDisplay">
                                                                @if ($user->role == 'owner') 
                                                                    Business owner 
                                                                @elseif ($user->role == 'general') 
                                                                    Finance Officer 
                                                                @elseif ($user->role == 'kuwago')
                                                                    Operational Manager 
                                                                @elseif ($user->role == 'uddesign') 
                                                                    Operational Manager 
                                                                @endif
                                                            </p> --}}
                                                        </div>
                                                        <div class="col-lg-2"></div>
                                                        <div class="col-lg-5">
                                                            <button type="submit" class="btn btn-warning">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 mt-1 d-flex align-items-center username">
                                                <label for="username" class="form-label"></label>
                                                <input type="text" class="form-control username-input" id="username" placeholder="Username" required />
                                            </div>

                                            <div class="col-lg-12 mt-1 d-flex align-items-center description">
                                                <label for="description" class="form-label"></label>
                                                <input type="text" class="form-control description-input" id="description" placeholder="Add Description" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Access</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 p-0">
                                    <div class="dropdown">
                                        @if ($user->role == 'owner')
                                        <select class="form-control" name="role">
                                            <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
                                        </select>
                                        @else
                                        <select class="form-control" name="role" id="accessSelect" onchange="updateRole()">
                                            <option value="general" {{ $user->role == 'general' ? 'selected' : '' }}>General</option>
                                            <option value="kuwago" {{ $user->role == 'kuwago' ? 'selected' : '' }}>Kuwago</option>
                                            <option value="uddesign" {{ $user->role == 'uddesign' ? 'selected' : '' }}>UdDesign</option>
                                        </select>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6 p-0">
                                    <div class="dropdown">
                                        <p>Role</p>
                                        <p id="roleDisplay">
                                            @if ($user->role == 'owner') 
                                                Business owner 
                                            @elseif ($user->role == 'general') 
                                                Finance Officer 
                                            @elseif ($user->role == 'kuwago')
                                                Operational Manager 
                                            @elseif ($user->role == 'uddesign') 
                                                Operational Manager 
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 style="color: #fff;">Profile</h6>
                                </div>
                            </div>

                            <div class="row fullname">
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center fname">
                                        <label for="first_name" class="form-label" style="color: #fff; font-size: 15px; font-weight: bold;">Firstname: </label>
                                        <input type="text" class="form-control fname-input" placeholder="First Name" id="fname" required />
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label for="last_name" class="form-label" style="color: #fff; font-size: 15px; font-weight: bold;">Lastname: </label>
                                        <input type="text" class="form-control lname-input" placeholder="Last Name" id="lname" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-flex align-items-center">
                                        <label for="middle_name" class="form-label" style="color: #fff; font-size: 15px; font-weight: bold;">Initial: </label>
                                        <input type="text" class="form-control mname-input" placeholder="Initial" id="mname" required />
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <label for="suffix" class="form-label" style="color: #fff; font-size: 15px; font-weight: bold;">Suffix: </label>
                                        <input type="text" class="form-control suffix-input" placeholder="Suffix" id="suffix" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h6 style="color: #fff;">Contact</h6>
                                </div>
                            </div>

                            <div class="row contact">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center">
                                        <label for="email" class="form-label pe-3" style="color: #fff; font-size: 15px; font-weight: bold;">Email: </label>
                                        <input type="text" class="form-control email-input" placeholder="Enter Email..." id="email" required />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="phone" class="form-label pe-2" style="color: #fff; font-size: 15px; font-weight: bold;">Phone: </label>
                                        <input type="text" class="form-control phone-input" placeholder="Enter Phone..." id="phone" required />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-8"></div>
                                <div class="col-lg-4">
                                    <a href="/admin/users/changepass" class="linktopass">
                                        <p class="mb-0">Change Password</p>
                                    </a>
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
    function updateRole() {
        var accessSelect = document.getElementById("accessSelect");
        var roleDisplay = document.getElementById("roleDisplay");
        var selectedAccess = accessSelect.value;

        var roleText = "";
        switch (selectedAccess) {
            case "owner":
                roleText = "Business owner";
                break;
            case "general":
                roleText = "Finance Officer";
                break;
            case "kuwago":
                roleText = "Operational Manager";
                break;
            case "uddesign":
                roleText = "Operational Manager";
                break;
        }
        roleDisplay.innerText = roleText;
    }
</script>
@endsection
