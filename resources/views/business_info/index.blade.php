<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container">
                    <h1 class="text-center mb-4">Your Businesses</h1>
                    
                    <div class="mb-4">
                        <a href="{{ url('business/create') }}" class="btn btn-primary">Add New Business</a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Business Name</th>
                                <th>Year</th>
                                <th>Type of Business</th>
                                <th>Location</th>
                                <th>Description</th>
                                <th>Image</th>
                                {{-- <th>icon</th> --}}
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($business_infos as $business)
                                <tr>
                                    <td>{{ $business->business_name }}</td>
                                    <td>{{ $business->year }}</td>
                                    <td>{{ $business->business_type }}</td>
                                    <td>{{ $business->location }}</td>
                                    <td>{{ $business->description }}</td>
                                    <td>
                                        <img src="{{ asset('images/' . $business->business_image) }}" alt="Product Image" width="100">
                                    </td>
                                    <td>
                                        <img src="{{ asset('logos/' . $business->business_logo) }}" alt="Business Logo" width="100">
                                    </td>
                                    <td>
                                        
                                        <a href="{{ url('/business', $business->id) }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ url('/business', $business->id)}}" method="post" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>



