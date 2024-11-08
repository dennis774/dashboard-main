    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="container">
                        <h1 class="text-center mb-4">Edit User</h1>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{url('business', $business_infos->id)}}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                                <label for="business_name">Business Name</label>
                                <input type="text" class="form-control" name="business_name" value="{{ $business_infos->business_name }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="business_image">business_image</label>
                                <input type="file" class="form-control" name="business_image" value="{{ $business_infos->business_image }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="business_logo">business_logo</label>
                                <input type="file" class="form-control" name="business_logo" value="{{ $business_infos->business_logo }}">
                            </div>
                            <div class="form-group mb-3">
                                <label for="year">Year</label>
                                <input type="text" class="form-control" name="year" value="{{ $business_infos->year }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="business_type">Type of Business</label>
                                <input type="text" class="form-control" name="business_type" value="{{ $business_infos->business_type }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="location">Location</label>
                                <input type="text" class="form-control" name="location" value="{{ $business_infos->location }}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" value="{{ $business_infos->description }}" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Update Business</button>
                            </div>
                        </form>
                    </div>
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
            </div>
        </div>
    </div> --}}
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Manage Users</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-4">
                    <a href="javascript:history.back()" class="backtoIndex
 d-flex justify-content-start">
                        <i class="fa-solid fa-arrow-left"></i>
                    </a>
                </div>
   
                <div class="col-lg-4 mt-4">
                    <h2 class="text-center" style="color: #fff; font-size: 35px;">Edit Your Businesses</h2>
                </div>
   
                <div class="col-lg-4 mt-4">
                </div>
            </div>
        </div>
   
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
   
        <div class="container">
            <form method="POST" action="{{url('business', $business_infos->id)}}" enctype="multipart/form-data">
                @csrf @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="container businessesCard ps-3 pb-3 pt-1">
                            <div class="row align-items-center">
                                <div class="col-lg-7 d-flex align-items-center businessName">
                                    <p><input type="text" class="form-control" name="business_name" value="{{ $business_infos->business_name }}" /></p>
                                </div>
                                <div class="col-lg-5 d-flex justify-content-center align-items-center">
                                    <label for="business_logo">
                                        <img src="{{ asset('business_logos/' . $business_infos->business_logo) }}" alt="Business Logo" class="logos" />
                                        <input type="file" id="business_logo" name="business_logo" style="display: none;" />
                                    </label>
                                </div>
                            </div>
   
                            <div class="row">
                                <div class="col-lg-12 d-flex justify-content-center">
                                    <label for="business_image" class="upload-btn">
                                        <img src="{{ asset('business_images/' . $business_infos->business_image) }}" alt="Business Image" class="businesses" />
                                        <input type="file" id="business_image" name="business_image" style="display: none;" />
                                    </label>
                                </div>
                            </div>
   
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <p class="businessSections">
                                        Year Established:
                                        <input type="text" class="editBusiness" name="year" value="{{ $business_infos->year }}" />
                                    </p>
                                </div>
                            </div>
   
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="businessSections">
                                        Business Type:
                                        <input type="text" class="editBusiness" name="business_type" value="{{ $business_infos->business_type }}" />
                                    </p>
                                </div>
                            </div>
   
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="businessSections">Location:</p>
                                    <input type="text" class="editBusiness" name="location" value="{{ $business_infos->location }}" />
                                </div>
                            </div>
   
                            <div class="row">
                                <div class="col-lg-12">
                                    <p class="businessSections">Description</p>
                                    <textarea class="businessIndexDesc" name="description" rows="4" required>{{ $business_infos->description }}</textarea>
                                </div>
                            </div>
   
                            <div class="row mt-3">
                                <div class="col-lg-12 d-flex justify-content-between">
                                    <form method="POST" action="{{ url('business', $business_infos->id) }}" enctype="multipart/form-data" class="w-100">
                                        @csrf @method('PUT')
                                        <button type="submit" class="updateBusiness"><i class="fa-regular fa-bookmark" style="color: black;"></i></button>
                                    </form>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
        </div>
   
        <script>
            document.querySelectorAll(".upload-btn").forEach((label) => {
                const input = label.querySelector('input[type="file"]');
                const img = label.querySelector("img");
                img.addEventListener("click", () => {
                    input.click();
                });
                input.addEventListener("change", (event) => {
                    const [file] = event.target.files;
                    if (file) {
                        img.src = URL.createObjectURL(file);
                    }
                });
            });
        </script>
    </body>
</html>

