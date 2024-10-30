    {{-- START --}}
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
                                        <p><i class="fa-solid fa-peso-sign"></i>P</p>
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
                                        <form method="GET" action="/admin/dashboard">
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

