@extends('general.index-two') @section('content')

<div class="container account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                <a href="{{ url('/account') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8">
                <h3 style="">Create New User</h3>
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

                    <form method="POST" action="{{ url('/account') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-4 pt-5 pb-5">
                                    <img src="https://via.placeholder.com/80" alt="User Image" class="user-image" />
                                </div>
                                <div class="col-lg-8">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-lg-5">
                                                            <p id="roleDisplay2">
                                                                Role
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
                                                <input type="text" class="form-control" name="name" placeholder="Username" required />
                                            </div>

                                            <div class="col-lg-12">
                                                <label for="description" class="form-label"></label>
                                                <input type="text" class="form-control" name="description" placeholder="Add Description" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <p>Access</p>
                                </div>
                                <div class="col-lg-6">
                                    <p></p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="">
                                        <select class="form-control" id="roleSelect" name="role" onchange="syncRole()">
                                            <option value="">Choose Access</option>
                                            <option value="general">General</option>
                                            <option value="kuwago">Kuwago</option>
                                            <option value="uddesign">UdDesign</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="">
                                        <p id="roleDisplay">
                                            -Role-
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <p>Set-up the Account</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="phone_number" class="form-label pe-2">Phone: </label>
                                        <input type="text" class="form-control" name="phone_number" placeholder="Enter Phone Number" required />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="email" class="form-label pe-3">Email: </label>
                                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required />
                                    </div>
                                    <div class="d-flex align-items-center mt-2">
                                        <label for="password" class="form-label pe-2">password: </label>
                                        <input type="text" class="form-control" name="password" value="Kuwago1Accounts" placeholder="Enter Phone Number" required />
                                    </div>
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
