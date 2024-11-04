<div class="container">
    <div class="row footer">
        <div class="col-lg-4">
            <button onclick="generatePDF()" class="btn btn-outline-light">Generate PDF</button>
        </div>
        <div class="col-lg-6">
            <div class="dropdown">
                <select id="dateFilter" onchange="handleFilterChange()" class="dropdownforModal">
                    <option value="today" {{ request('interval') == 'today' ? 'selected' : '' }}>Today</option>
                    <option value="yesterday" {{ request('interval') == 'yesterday' ? 'selected' : '' }}>Yesterday</option>
                    <option value="last3days" {{ request('interval') == 'last3days' ? 'selected' : '' }}>Last 3 Days</option>
                    <option value="last5days" {{ request('interval') == 'last5days' ? 'selected' : '' }}>Last 5 Days</option>
                    <option value="lastweek" {{ request('interval') == 'lastweek' ? 'selected' : '' }}>Last Week</option>
                    <option value="thisweek" {{ request('interval', 'thisweek') == 'thisweek' ? 'selected' : '' }}>This Week</option>
                    <option value="thismonth" {{ request('interval') == 'thismonth' ? 'selected' : '' }}>This Month</option>
                    <option value="lastmonth" {{ request('interval') == 'lastmonth' ? 'selected' : '' }}>Last Month</option>
                    <option value="thisyear" {{ request('interval') == 'thisyear' ? 'selected' : '' }}>This Year</option>
                    <option value="lastyear" {{ request('interval') == 'lastyear' ? 'selected' : '' }}>Last Year</option>
                    <option value="overall" {{ request('interval') == 'overall' ? 'selected' : '' }}>Overall</option>
                    <option value="custom" {{ request('interval') == 'custom' ? 'selected' : '' }}>Custom</option>
                </select>                
            </div>            
        </div>

        <div class="col-lg-2">
            <i class="fas fa-filter filter-icon" onclick="updateChartWithFilter()"></i>
        </div>
    </div>

    <div class="modal-bg" id="customDateModal">
        <div class="modal-content">
            <h5>Select Date Range</h5>
            <form action="{{$actionRoute}}" method="GET">
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
