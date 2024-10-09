<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales Dashboard</title>

    <!-- Bootstrap for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    

    <style>
        .card {
            margin-top: 50px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        .filter-dropdown {
            margin-bottom: 20px;
            text-align: center;
        }
        .content {
            margin-left: 250px; /* Adjusted for the sidebar */
            padding: 20px;
        }
    </style>
</head>
<body>


    <!-- Main content with the chart -->
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Sales Chart</h5>

                    <!-- Filter dropdown -->
                    <div class="filter-dropdown">
                        <select class="form-select" id="chartFilter" aria-label="Filter Sales Data">
                            <option value="weekly">Weekly</option>
                            <option value="monthly">Monthly</option>
                            <option value="yearly">Yearly</option>
                        </select>
                    </div>

                    <!-- Canvas for the chart -->
                    <canvas id="salesChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Chart.js logic -->
    <script>
        const ctx = document.getElementById('salesChart').getContext('2d');
        let salesChart;

        // Function to update chart data based on the selected filter
        function updateChart(filter) {
            const labels = {
                weekly: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                monthly: @json($chartdata->pluck('date')),
                yearly: ['2000', '2001', '2002', '2003', '2004', '2005', '2006']
            };

            const data = {
                weekly: [1000, 3000, 5000, 7000, 9000, 11000, 15000],
                monthly: @json($chartdata->pluck('total_remittance')),
                yearly: [100000, 200000, 300000, 400000, 500000, 1000000]
            };

            const chartData = {
                labels: labels[filter],
                datasets: [{
                    label: `${filter.charAt(0).toUpperCase() + filter.slice(1)} Sales`,
                    data: data[filter],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: true,
                    tension: 0.1
                }]
            };

            if (salesChart) {
                salesChart.destroy();
            }

            salesChart = new Chart(ctx, {
                type: 'line',
                data: chartData,
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true
                        }
                    }
                }
            });
        }

        // Initialize with weekly data
        updateChart('weekly');

        // Event listener for filter change
        document.getElementById('chartFilter').addEventListener('change', function() {
            const selectedFilter = this.value;
            updateChart(selectedFilter);
        });
    </script>
</body>
</html>
