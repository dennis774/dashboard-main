    <div class="py-12">
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
    </div>
