{{--
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    You are admin!.
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
--}} {{-- <a href="/profile">profile</a> --}}

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Cap-Board</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        {{-- BOOTSTRAP --}}
        <link href="{{ url('assets/css/style.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/chart.js') }}"></script>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
        <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
        {{-- END OF BOOTSTRAP --}} {{-- FONT AWESOME --}}
        <link rel="stylesheet" href="{{url('fontawesome-free-6.6.0-web/css/all.min.css')}}" />
        {{-- END OF FONT AWESOME --}}
    </head>
    <body>
        <div class="container-fluid" style="background-image: url('https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg');">
            {{-- START OF TOP BAR --}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 border-black border top-bar">
                        <div style="container">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="welcome-user">
                                        <img src="#" class="user-image" />
                                        <span>Welcome, {{ Auth::user()->name }}!</span>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="mx-auto dropdown-oval-container">
                                        <div class="dropdown">
                                            <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Main
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="#">Main</a></li>
                                                <li><a class="dropdown-item" href="#">Kuwago Cafe 1</a></li>
                                                <li><a class="dropdown-item" href="#">Kuwago Cafe 2</a></li>
                                                <li><a class="dropdown-item" href="#">Uddesign</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div>
                                        <a href="#" class="mx-2"><i class="fa-solid fa-store"></i></a>
                                        <a href="{{route('profile.edit')}}" class="mx-2"><i class="fa-solid fa-user"></i></a>
                                        <a href="#" class="mx-2"><i class="fa-solid fa-gear"></i></a>
                                        @if (Auth::check())
                                        <a href="{{ route('logout') }}" class="mx-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
            {{-- END OF TOP BAR --}} {{-- START --}}
            <div class="container text-center">
                <div class="row border-danger border border-2 mb-5">
                    {{-- START OF SIDE BAR --}}
                    <div class="col-lg-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 side-bar">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}"> <i class="fa-solid fa-border-all"></i><span>General</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}"> <i class="fa-solid fa-chart-line"></i><span>Sales</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}"> <i class="fa-solid fa-wallet"></i><span>Expenses</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}"> <i class="fa-solid fa-tags"></i><span>Promos</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link {{ request()->routeIs('#') ? 'active' : '' }}"> <i class="fa-solid fa-star"></i><span>Feedbacks</span> </a>
                                        </li>
                                    </ul>
                                    <button id="toggleSidebar" class="btn btn-light btn-sm mt-3">
                                        <i class="fa-solid fa-bars"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
                    <div class="col-lg-10 border-black border p-3 contents">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-6 card-box">
                                                <i class="fa-solid fa-chart-line"></i>
                                                <p>Total Sales</p>
                                                <p><i class="fa-solid fa-peso-sign"></i>3,700.00</p>
                                            </div>
                                            <div class="col-lg-6 card-box">
                                                <i class="fa-solid fa-coins"></i>
                                                <p>Total Profit</p>
                                                <p><i class="fa-solid fa-peso-sign"></i>2,000.00</p>
                                            </div>
                                            <div class="col-lg-6 card-box">
                                                <i class="fa-solid fa-money-bill"></i>
                                                <p>Total Expenses</p>
                                                <p>1,700.00</p>
                                            </div>
                                            <div class="col-lg-6 card-box">
                                                <i class="fa-solid fa-cart-shopping"></i>
                                                <p>Total Orders</p>
                                                <p>26</p>
                                            </div>
                                            <div class="col-lg-12 card-box">
                                                <p>Target Sales</p>
                                                <p><i class="fa-solid fa-peso-sign"></i>5,000.00</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12 card-box">
                                                <form method="GET" action="/dashboard-main">
                                                    <input type="date" name="start_date" required>
                                                    <input type="date" name="end_date" required>
                                                    <button type="submit">Filter</button>
                                                </form>
                                                
                                                <canvas id="myChart" width="400" height="400"></canvas>
                                            </div>

                                            <div class="col-lg-12">
                                                <p>Compare With</p>
                                            </div>
                                            
                                            <div class="col-lg-12 card-box">
                                                <div class="glass-bg">
                                                    <select id="dateFilterLeft" onchange="handleFilterChangeleft()">
                                                        <option value="thisweek" selected>This Week</option>
                                                        <option value="today">Today</option>
                                                        <option value="yesterday">Yesterday</option>
                                                        <option value="last3days">Last 3 Days</option>
                                                        <option value="last5days">Last 5 Days</option>
                                                        <option value="last7days">Last 7 Days</option>
                                                        <option value="lastweek">Last Week</option>
                                                        <option value="thismonth">This Month</option>
                                                        <option value="lastmonth">Last Month</option>
                                                        <option value="thisyear">This Year</option>
                                                        <option value="lastyear">Last Year</option>
                                                        <option value="overall">Overall</option>
                                                        <option value="custom">Custom</option>
                                                    </select>
                                                </div>
                                                <div class="mt-2"><i class="fas fa-dollar-sign"></i> Total Profit: ₱ 000,000</div>
                                                <div><i class="fas fa-chart-line"></i> Total Sales: ₱ 000,000</div>
                                                <div><i class="fas fa-money-bill-wave"></i> Total Expenses: ₱ 000,000</div>
                                                <div><i class="fas fa-shopping-cart"></i> Total Orders:</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END OF CONTENTS--}}
            </div>
            {{-- END--}}

            <div class="container">
                <div class="row footer">
                    <div class="col-lg-4">
                        <button onclick="generatePDF()" class="btn btn-outline-light">Generate PDF</button>
                    </div>
                    <div class="col-lg-6 border-black border">
                        <div class="dropdown">
                            <select id="dateFilter" onchange="handleFilterChange()" class="dropdownforModal">
                                <option value="today">Today</option>
                                <option value="yesterday">Yesterday</option>
                                <option value="last3days">Last 3 Days</option>
                                <option value="last5days">Last 5 Days</option>
                                <option value="last7days">Last 7 Days</option>
                                <option value="thisweek">This Week</option>
                                <option value="lastweek">Last Week</option>
                                <option value="thismonth">This Month</option>
                                <option value="lastmonth">Last Month</option>
                                <option value="thisyear">This Year</option>
                                <option value="lastyear">Last Year</option>
                                <option value="overall">Overall</option>
                                <option value="custom">Custom</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-2 border-black border">
                        <i class="fas fa-filter filter-icon" onclick="updateChartWithFilter()"></i>
                    </div>
                </div>

                <div class="modal-bg" id="customDateModal">
                    <div class="modal-content">
                        <h5>Select Date Range</h5>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="start_date" class="form-label text-white">Start Date:</label>
                                <input type="date" id="start_date" name="start_date" class="form-control" value="{{ request('start_date', \Carbon\Carbon::now()->subDays(6)->toDateString()) }}" required />
                            </div>
                            <div class="form-group mb-3">
                                <label for="end_date" class="form-label text-white">End Date:</label>
                                <input type="date" id="end_date" name="end_date" class="form-control" value="{{ request('end_date', \Carbon\Carbon::now()->toDateString()) }}" required />
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="button" onclick="closeModal()" class="btn btn-secondary me-2">Cancel</button>
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($chartdata->pluck('date')),
                    datasets: [{
                        label: 'Sales',
                        data: @json($chartdata->pluck('total_remittance')),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1,
                        fill: 'origin'
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>

        {{-- <script>
            function generatePDF() {
                // Implement PDF generation logic here
                alert("PDF Generated!"); // Placeholder
            }

            function handleFilterChange() {
                const filter = document.getElementById("dateFilter").value;
                if (filter === "custom") {
                    document.getElementById("customDateModal").style.display = "flex";
                }
            }

            function updateChartWithFilter() {
                const filter = document.getElementById("dateFilter").value;
                // Implement chart update logic based on filter selection
                alert("Chart Updated with filter: " + filter); // Placeholder
            }

            function closeModal() {
                document.getElementById("customDateModal").style.display = "none";
            }
        </script> --}}
    </body>
</html>
