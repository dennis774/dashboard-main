

    <div class="py-12">
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
    </div>



