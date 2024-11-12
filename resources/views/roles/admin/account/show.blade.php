@extends('general.index-two') @section('content')
<div class="container account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                <a href="{{ url('/account') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8">
                @if ($user->role == 'owner')
                <h3>Edit My Account</h3>
                @else
                <h3>Edit User Account</h3>
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
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 pt-5 pb-5">
                                <img src="{{ asset('user_images/' . $user->user_image) }}" alt="User Image" width="100" />
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
                                                    <div class="col-lg-5"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p>Username: {{ $user->name }}</p>
                                        </div>

                                        <div class="col-lg-12">
                                            <p>Description: {{ $user->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <p>Access:</p>
                                <p>{{ $user->role }}</p>
                            </div>
                            <div class="col-lg-6">
                                <p>Role:</p>
                                <p id="roleDisplay">
                                    @if ($user->role == 'owner') Business owner @elseif ($user->role == 'general') Finance Officer @elseif ($user->role == 'kuwago') Operational Manager @elseif($user->role =='uddesign') Operational Manager
                                    @endif
                                </p>
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
                                    <p>Firstname:</p>
                                    <p>{{ $user->first_name }}</p>
                                </div>
                                <div class="">
                                    <p>Lastname:</p>
                                    <p>{{ $user->last_name }}</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="">
                                    <p>Initial:</p>
                                    <p>{{ $user->initial }}</p>
                                </div>
                                <div class="">
                                    <p>Suffix:</p>
                                    <p>{{ $user->suffix }}</p>
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
                                    <p>Email:</p>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="d-flex align-items-center mt-2">
                                    <p>Phone:</p>
                                    <p>{{ $user->phone_number }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                {{-- <div class="col-lg-6">
                    <a href="{{ url('/account', $user->id) }}/edit">
                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                    </a>
                </div> --}}
                <div class="col-lg-6">
                    <a href="{{ route('account.edit', ['account' => $user->id]) }}">
                        <i class="fa-regular fa-pen-to-square fa-xl"></i>
                    </a>
                </div>
            </div>
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
