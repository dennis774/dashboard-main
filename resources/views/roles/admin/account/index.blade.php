@extends('general.index-two') @section('content')
<div class="container mb-100 account-page">
    <div class="container text-center">
        <div class="row pt-5 pb-5">
            <div class="col-lg-2">
                <a href="{{ url('admin/dashboard') }}"><i class="fa-solid fa-arrow-left fa-xl"></i></a>
            </div>
            <div class="col-lg-8">
                <h3 style="">Accounts</h3>
            </div>
            <div class="col-lg-2">
                <a href="{{ url('admin/account/create') }}"><i class="fa-solid fa-plus fa-xl"></i></a>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <i class="fa-regular fa-user fa-xl"></i><span>All Accounts</span>
                        </div>
                    </div>
                </div>
                <div class="container overflow-auto" style="height: 400px;">
                    <div class="row">
                        
                        @foreach($users as $user)
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
                                                <div class="col-lg-12"><p>{{ $user->role }}</p></div>
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
                                        <a href="{{ url('admin/account', $user->id) }}/edit">
                                            <i class="fa-regular fa-pen-to-square fa-xl"></i>
                                        </a>
                                    </div>
                                    <div class="col-lg-6 delete-button">
                                        <form action="{{ url('admin/account', $user->id)}}" method="post" style="display: inline-block;">
                                            @csrf @method('DELETE')

                                            <button type="submit" class="btn" onclick="return confirm('Are you sure?')">
                                                <i class="fa-regular fa-trash-can fa-xl"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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
