<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($chartdata->pluck('date')),
            datasets: [{
                label: 'Sales',
                data: @json($chartdata->pluck('sales')),
                backgroundColor: 'green',
                borderColor: 'green',
                borderWidth: 1,
                fill: 'origin'

                
            },{
                label: 'Profit',
                data: @json($chartdata->pluck( 'profit' )),
                backgroundColor: 'yellow',
                borderColor: 'yellow',
                borderWidth: 1,
                fill: 'origin'

                
            },{
                label: 'Expenses',
                data: @json($chartdata->pluck('expenses')),
                backgroundColor: 'white',
                borderColor: 'white',
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