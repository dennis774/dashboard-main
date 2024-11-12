{{-- START OF TOP BAR --}}
<div class="container">
    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8 nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                    @if(Auth::check() && Auth::user()->user_image)
                        <img src="{{ asset('user_images/' . Auth::user()->user_image) }}" alt="User Image" width="50" height="50" style="border-radius: 50%;">
                    @else
                        <img src="https://via.placeholder.com/80" alt="Default User Image" width="50" height="50" style="border-radius: 50%;">
                    @endif
                        <span>Welcome, {{ Auth::user()->name }}!</span>
                    </div>

                    <div class="col-lg-4">
                        <div class="mx-auto dropdown-oval-container">
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Business
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li><a class="dropdown-item" href="{{url('/kuwago-one')}}">Kuwago Cafe 1</a></li>
                                    <li><a class="dropdown-item" href="{{url('/kuwago-two')}}">Kuwago Cafe 2</a></li>
                                    <li><a class="dropdown-item" href="{{url('/uddesign')}}">Uddesign</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div>
                            <!-- Link to the business page -->
                            <a href="{{ route('business.index') }}" class="mx-2"><i class="fa-solid fa-store"></i></a>

                            <!-- Link to the account page -->
                            <a href="{{ route('account.index') }}" class="mx-2"><i class="fa-solid fa-user"></i></a>
                            <a href="{{ route('targetSales.index') }}" class="mx-2"><i class="fa-solid fa-crosshairs"></i></a>
                            <!-- Link to the settings page with user ID -->
                            <a href="{{ route('settings.account-show', ['id' => Auth::user()->id]) }}" class="mx-2"><i class="fa-solid fa-gear"></i></a>

                            <!-- Logout link -->
                            @if (Auth::check())
                            <a href="{{ route('logout') }}" class="mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
{{-- END OF TOP BAR --}}
