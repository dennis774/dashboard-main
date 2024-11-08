@extends('general.index-two') @section('content')
<div class="container account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                {{-- <a href="kuwago-one"><i class="fa-solid fa-arrow-left fa-xl"></i></a> --}}
                <a href="{{ route('general.kuwago-one.dashboard') }}">
                    <i class="fa-solid fa-arrow-left fa-xl"></i>
                </a>
            </div>
            <div class="col-lg-8">
                <h3 style="">Accounts</h3>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12"><i class="fa-regular fa-user fa-xl"></i><span>All Accounts</span></div>
                    </div>
                </div>
                <div class="container overflow-auto" style="height: 400px;">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-3 text-center">
                                        <!-- Dummy image -->
                                        <img src="https://via.placeholder.com/80" alt="User Image" class="user-image" />
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-12"><p>{{ $user->name }}</p></div>
                                                <div class="col-lg-12">
                                                    <p>
                                                        @if ($user->role == 'owner') 
                                                            Business owner 
                                                        @elseif ($user->role == 'general') 
                                                            Finance Officer 
                                                        @elseif ($user->role == 'kuwago') 
                                                            Operational Manager 
                                                        @elseif($user->role =='uddesign')
                                                            xOperational Manager 
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a href="{{ route('settings.account-edit', ['id' => Auth::user()->id]) }}">
                                            <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
@endsection
