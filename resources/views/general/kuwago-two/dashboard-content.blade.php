{{-- START --}}
    <div class="container text-center content-container">
        <div class="row mb-5">
            {{-- START OF SIDE BAR --}}
            <div class="col-lg-1">
                <div class="container">
                    <div class="row">
                        @include('general.kuwago-one.sidebar')
                    </div>
                </div>
            </div>
            {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
            <div class="col-lg-11 p-3 contents">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 card-box">
                                        <i class="fa-solid fa-chart-line"></i>
                                        <p>Total Sales</p>
                                        <p>₱{{ $totalSales }}</p>
                                    </div>
                                    <div class="col-lg-6 card-box">
                                        <i class="fa-solid fa-coins"></i>
                                        <p>Total Profit</p>
                                        <p>₱{{ $totalProfit }}</p>
                                    </div>
                                    <div class="col-lg-6 card-box">
                                        <i class="fa-solid fa-money-bill"></i>
                                        <p>Total Expenses</p>
                                        <p>₱{{ $totalExpenses }}</p>
                                    </div>
                                    <div class="col-lg-6 card-box">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <p>Total Orders</p>
                                        <p>{{ $totalOrders }}</p>
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
                                        <canvas id="myChart" width="400" height="200"></canvas>
                                        <form action="{{ route('refresh.data') }}" method="GET">
                                            <button type="submit" class="btn btn-primary">Refresh Data</button>
                                        </form>
                                        
                                    </div>

                                    <div class="col-lg-12">
                                        <p>Compare With</p>
                                    </div>
                                    
                                    <div class="col-lg-12 card-box">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <p>This week</p>
                                                    <div class="mt-2"><i class="fas fa-dollar-sign"></i> Total Profit: ₱ {{$thisWeekProfit}}</div>
                                                    <div><i class="fas fa-chart-line"></i> Total Sales: ₱ {{$thisWeekSales}}</div>
                                                    <div><i class="fas fa-money-bill-wave"></i> Total Expenses: ₱ {{$thisWeekExpenses}}</div>
                                                    <div><i class="fas fa-shopping-cart"></i> Total Orders: {{$thisWeekOrders}}</div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <p>Last Week</p>
                                                    <div class="mt-2"><i class="fas fa-dollar-sign"></i> Total Profit: ₱ {{$lastWeekProfit}}</div>
                                                    <div><i class="fas fa-chart-line"></i> Total Sales: ₱ {{$lastWeekSales}}</div>
                                                    <div><i class="fas fa-money-bill-wave"></i> Total Expenses: ₱ {{$lastWeekExpenses}}</div>
                                                    <div><i class="fas fa-shopping-cart"></i> Total Orders: {{$lastWeekOrders}}</div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
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

