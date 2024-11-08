

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <h1 class="text-center mb-4">Create New Business</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ url('business') }}" enctype="multipart/form-data"> 
                        @csrf
                        
                        <div class="form-group mb-3">
                            <label for="business_name">Business Name</label>
                            <input type="text" class="form-control" name="business_name" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="business_image">Business Image</label>
                            <input type="file" class="form-control" name="business_image" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="business_logo">Business Logo</label>
                            <input type="file" class="form-control" name="business_logo" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="year">Year</label>
                            <input type="text" class="form-control" name="year" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="business_type">Type of Business</label>
                            <input type="text" class="form-control" name="business_type" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="location">Location</label>
                            <input type="text" class="form-control" name="location" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" name="description" required>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">Create Business</button>
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

        
        
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                            <h1 class="text-center text-2xl font-semibold mb-4">Create New Business</h1>
                           
                            @if ($errors->any())
                                <div class="alert alert-danger bg-red-100 text-red-800 p-4 rounded mb-4">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
        
        
                            <form method="POST" action="{{ url('business') }}" enctype="multipart/form-data">
                                @csrf
                               
                                <div class="mb-4">
                                    <label for="business_name" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Business Name</label>
                                    <input type="text" class="form-input w-full" name="business_name" required>
                                </div>
                                <div class="mb-4">
                                    <label for="business_image" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Business Image</label>
                                    <input type="file" class="form-input w-full" name="business_image" required>
                                </div>
                                <div class="mb-4">
                                    <label for="business_logo" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Business Logo</label>
                                    <input type="file" class="form-input w-full" name="business_logo" required>
                                </div>
                                <div class="mb-4">
                                    <label for="year" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Year</label>
                                    <input type="text" class="form-input w-full" name="year" required>
                                </div>
                                <div class="mb-4">
                                    <label for="business_type" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Type of Business</label>
                                    <input type="text" class="form-input w-full" name="business_type" required>
                                </div>
                                <div class="mb-4">
                                    <label for="location" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Location</label>
                                    <input type="text" class="form-input w-full" name="location" required>
                                </div>
                                <div class="mb-4">
                                    <label for="description" class="block text-gray-700 dark:text-gray-300 font-medium mb-2">Description</label>
                                    <textarea class="form-input w-full" name="description" required></textarea>
                                </div>
                               
                                <div class="text-center">
                                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Create Business
                                    </button>
                                </div>
                            </form>
        
        
                            @if (session('error'))
                                <div class="alert alert-danger bg-red-100 text-red-800 p-4 rounded mt-4">
                                    {{ session('error') }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        
    </body>
</html>



