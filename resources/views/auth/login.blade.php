{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Log in</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" /> --}}
    <script src="{{ url('assets/js/chart.js') }}"></script>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
    <style>
        body{
    background-image: url('https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    min-height: 100vh; /* Ensures it covers the full viewport height */
}


div.loginForm{
    backdrop-filter: blur(20px);
    border-radius:10px;
}
.active-toggle {
    background-color:#fff;
}
.hidden {
    display: none;
}
 img.uddesignLogo{
    width: 70px;
    height: 70px;
 }


 img.kuwagoLogo{
    width: 70px;
    height: 70px;
 }


 img.loginImages{
    width: 180px;
    height: 125px;
    border-radius: 10px;
 }


 button.Loginslide-btn {
    padding: 5px 5px;
    font-size: 16px;
    color: #fff;
    background: rgba(255, 255, 255, 0.1); /* Transparent background */
    backdrop-filter: blur(10px); /* Blur effect */
    border: 1px solid rgba(255, 255, 255, 0.3); /* Semi-transparent border */
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    width: 130px; /* Set fixed width */
    text-align: center; /* Center the text */
}




/* Hover effect */
button.Loginslide-btn:hover {
    background: rgba(255, 255, 255, 0.2);
    transform: scale(1.05);
}


div.loginDesc {
    height: 50px; /* Set your preferred height */
    overflow-y: scroll;
    scrollbar-width: none; /* Firefox */
}


div.loginDesc::-webkit-scrollbar {
    display: none; /* Chrome, Safari, and Edge */
}


div.loginNav{
    cursor: pointer;
    transition: background 0.3s;
    max-width: 150px;
}
.active-toggle {
    background: rgba(255, 255, 255, 0.3);
    color: #000; /* Optional: Adjust text color for better contrast */
    border-radius: 8px; /* Optional: Add styling as needed */
    font-weight: bold; /* Emphasize active item */
   
}

    </style>
</head>
<body>
    <div class="container" style="display: flex; align-items: center; justify-content: center; min-height: 100vh;">
        <div class="container" style="height:400px;">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="container loginForm" style="padding: 20px;">
                        <div class="row d-flex justify-content-around">
                            <div class="col-lg-3 d-flex justify-content-center loginNav" onclick="showSection('signIn')">
                                <h6 style="color: #fff;">Sign In</h6>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center loginNav" onclick="showSection('uddesign')">
                                <h6 style="color: #fff;">Uddesign</h6>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center loginNav" onclick="showSection('kuwagoCafe1')">
                                <h6 style="color: #fff;">Kuwago Cafe 1</h6>
                            </div>
                            <div class="col-lg-3 d-flex justify-content-center loginNav" onclick="showSection('kuwagoCafe2')">
                                <h6 style="color: #fff;">Kuwago Cafe 2</h6>
                            </div>
                        </div>


                        <div id="signIn" class="section">
                            <div class="row">
                                <div class="col-lg-12 mt-3 d-flex justify-content-center">
                                    <h4 style="color: #fff;">Welcome Back!</h4>
                                </div>
                            </div>
                       
                            <div class="row">
                                <div class="col-lg-1 mt-3"></div>
                                <div class="col-lg-10 mt-3">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="form-group d-flex align-items-center position-relative">
                                            <label for="email" style="margin-right: 38px; color: #fff; margin-bottom: -23px;">Email</label>
                                            <input
                                                type="email"
                                                class="form-control"
                                                id="email"
                                                name="email"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter email"
                                                style="flex: 1; background: transparent; border: none; border-bottom: 2px solid #fff; color: #fff; outline: none; border-radius: 0; box-shadow: none; padding-right: 30px;"
                                                value="{{ old('email') }}"
                                                required
                                                autofocus
                                                autocomplete="off"
                                            />
                                            <button
                                                type="button"
                                                onclick="document.getElementById('email').value='';"
                                                style="position: absolute; right: 5px; background: none; border: none; color: #fff; cursor: pointer; font-size: 16px;"
                                            >
                                                &times;
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                       
                                        <div class="form-group d-flex align-items-center position-relative">
                                            <label for="password" style="margin-right: 10px; color: #fff; margin-bottom: -23px;">Password</label>
                                            <input
                                                type="password"
                                                class="form-control"
                                                id="password"
                                                name="password"
                                                placeholder="Password"
                                                style="flex: 1; background: transparent; border: none; border-bottom: 2px solid #fff; color: #fff; outline: none; border-radius: 0; box-shadow: none; padding-right: 30px;"
                                                required
                                                autocomplete="new-password"
                                            />
                                            <button
                                                type="button"
                                                onclick="document.getElementById('password').value='';"
                                                style="position: absolute; right: 5px; background: none; border: none; color: #fff; cursor: pointer; font-size: 16px;"
                                            >
                                                &times;
                                            </button>
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                       
                                        <div class="block mt-4">
                                            <label for="remember_me" class="inline-flex items-center">
                                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                                <span class="ms-2 text-sm text-white">{{ __('Remember me') }}</span>
                                            </label>
                                        </div>
                       
                                        <div class="row mt-1">
                                            <div class="col-lg-12 d-flex justify-content-center">
                                                @if (Route::has('password.request'))
                                                    <a class="underline text-sm text-white hover:text-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                                        {{ __('Forgot password?') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                       
                                        <div class="row mt-3">
                                            <div class="col-lg-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary">Sign in</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-1 mt-3"></div>
                            </div>
                        </div>
                       
                       


                        <div id="uddesign" class="section hidden mt-4">
                            <div class="row">
                                <div class="col-lg-1 "></div>
                                <div class="col-lg-3 ">
                                    <div class="col-lg-4 user-image" style="height:140px;">
                                        <img src="/images/officeSample.jpg" alt="kuwago" class="loginImages">
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Year Established:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Business Type:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Location:</p>
                                            <p style="color:#fff; font-size:15px;">2F LCA Bldg., Universidad de Dagupan, Arellano St., Dagupan, Pangasinan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1  d-flex justify-content-center">
                                    <img src="/images/uddesign.png" alt="kuwago" class="uddesignLogo">
                                </div>
                                <div class="col-lg-3 ">
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="navigateTo('next')">View Next</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="navigateTo('previous')">View Previous</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="showSection('signIn')">Go to Sign In</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 "></div>
                            </div>
                           
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-11">
                                    <p style="color: #fff;">Description</p>
                                </div>
                            </div>
                            <div class="row loginDesc">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <p style="color: #fff;">Download the perfect office background pictures. Find over 100+ of the best free office background images. Free for commercial use ✓ No attribution required ...</p>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                           
                        </div>


                        <div id="kuwagoCafe1" class="section hidden mt-4">
                            <div class="row">
                                <div class="col-lg-1 "></div>
                                <div class="col-lg-3 ">
                                    <div class="col-lg-4 user-image" style="height:140px;">
                                        <img src="/images/kuwago1.jpg" alt="kuwago" class="loginImages">
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Year Established:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Business Type:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Location:</p>
                                            <p style="color:#fff; font-size:15px;">2F LCA Bldg., Universidad de Dagupan, Arellano St., Dagupan, Pangasinan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1  d-flex justify-content-center">
                                    <img src="/images/kuwagologo.png" alt="kuwago" class="kuwagoLogo">
                                </div>
                                <div class="col-lg-3 ">
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="navigateTo('next')">View Next</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="navigateTo('previous')">View Previous</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="showSection('signIn')">Go to Sign In</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 "></div>
                            </div>
                           
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-11">
                                    <p style="color: #fff;">Description</p>
                                </div>
                            </div>
                            <div class="row loginDesc">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <p style="color: #fff;">Download the perfect office background pictures. Find over 100+ of the best free office background images. Free for commercial use ✓ No attribution required ...</p>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                           
                        </div>


                        <div id="kuwagoCafe2" class="section hidden mt-4">
                            <div class="row">
                                <div class="col-lg-1 "></div>
                                <div class="col-lg-3 ">
                                    <div class="col-lg-4 user-image" style="height:140px;">
                                        <img src="/images/kuwago2.jpeg" alt="kuwago" class="loginImages">
                                    </div>
                                </div>
                                <div class="col-lg-3 ">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Year Established:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Business Type:</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p style="color:#fff;">Location:</p>
                                            <p style="color:#fff; font-size:15px;">2F LCA Bldg., Universidad de Dagupan, Arellano St., Dagupan, Pangasinan</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1  d-flex justify-content-center">
                                    <img src="/images/kuwagologo.png" alt="kuwago" class="kuwagoLogo">
                                </div>
                                <div class="col-lg-3 ">
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="navigateTo('next')">View Next</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="navigateTo('previous')">View Previous</button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 mt-2 d-flex justify-content-end">
                                            <button class="Loginslide-btn" onclick="showSection('signIn')">Go to Sign In</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 "></div>
                            </div>
                           
                            <div class="row">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-11">
                                    <p style="color: #fff;">Description</p>
                                </div>
                            </div>
                            <div class="row loginDesc">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-9">
                                    <p style="color: #fff;">Download the perfect office background pictures. Find over 100+ of the best free office background images. Free for commercial use ✓ No attribution required ...</p>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                           
                        </div>


                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>


   <script>
    function showSection(sectionId) {
    // Hide all sections
    const sections = document.querySelectorAll(".section");
    sections.forEach((section) => {
        section.classList.add("hidden");
    });


    // Remove active-toggle from all nav items
    const navItems = document.querySelectorAll(".loginNav");
    navItems.forEach((item) => {
        item.classList.remove("active-toggle");
    });


    // Show the selected section
    document.getElementById(sectionId).classList.remove("hidden");


    // Find and highlight the active tab
    const activeItem = Array.from(navItems).find(
        (item) => item.textContent.trim().replace(/\s/g, "").toLowerCase() === sectionId.toLowerCase()
    );
    if (activeItem) {
        activeItem.classList.add("active-toggle");
    }


    // Store the active section in localStorage
    localStorage.setItem('activeSection', sectionId);
}
function navigateTo(direction) {
    const sections = ['uddesign', 'kuwagoCafe1', 'kuwagoCafe2'];
    const currentSectionId = localStorage.getItem('activeSection') || 'signIn';
    const currentIndex = sections.indexOf(currentSectionId);
   
    let targetIndex;
   
    if (direction === 'next') {
        targetIndex = currentIndex + 1 < sections.length ? currentIndex + 1 : currentIndex; // Prevent going out of bounds
    } else if (direction === 'previous') {
        targetIndex = currentIndex - 1 >= 0 ? currentIndex - 1 : currentIndex; // Prevent going out of bounds
    }


    if (targetIndex !== undefined) {
        const targetSectionId = sections[targetIndex];
        showSection(targetSectionId); // Navigate to the target section
    }
}


// Store the active section in localStorage on navigation
const activeSection = localStorage.getItem('activeSection') || 'signIn';
showSection(activeSection);


   </script>
</body>
</html>

