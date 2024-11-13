    {{-- START --}}
    <div class="container text-center content-container">
        <div class="row mb-5">
            {{-- START OF SIDE BAR --}}
            <div class="col-lg-1">
                <div class="container">
                    <div class="row">
                        @include('general.uddesign.sidebar')
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
                                    <div class="col-lg-6">
                                        <h6>Total Sales</h6>
                                        <p>₱{{ $totalSales }}</p>
                                        <p>Print/Photo: ₱{{ $totalPrintSales }}</p>
                                        <p>UdD Merch: ₱{{ $totalMerchSales }}</p>
                                        <p>Closed Deals: ₱{{ $totalCustomSales }}</p>
                                    </div>
                                    <div class="col-lg-6">
                                    <canvas id="myChart1" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <canvas id="myChart2" width="400" height="200"></canvas>
                        </div>
                        

                        <script>
                            // Get the cash and gcash data from the Blade template
                            const totalCash = @json($totalCash);
                            const totalGcash = @json($totalGcash);

                            console.log(totalCash, totalGcash); // Debug: Check the console to see if the values are correct

                            const xValues = ["Cash", "Gcash"];
                            const yValues = [totalCash, totalGcash]; // Use the dynamic data

                            const barColors = ["#b91d47", "#00aba9"];

                            new Chart("myChart1", {
                                type: "doughnut",
                                data: {
                                    labels: xValues,
                                    datasets: [{
                                        backgroundColor: barColors,
                                        data: yValues
                                    }]
                                },
                                options: {
                                    title: {
                                        display: true,
                                        text: "Cash vs Gcash"
                                    }
                                }
                            });
                        </script>


                        <script>
                                var ctx = document.getElementById('myChart2').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($chartdata->pluck('date')),
                                        datasets: [{
                                            label: 'Print/Photo',
                                            data: @json($chartdata->pluck('print_sales')),
                                            // backgroundColor: 'green',
                                            borderColor: 'blue',
                                            borderWidth: 1,
                                            fill: 'origin'

                                            
                                        },{
                                            label: 'UdD Merch',
                                            data: @json($chartdata->pluck('merch_sales')),
                                            // backgroundColor: 'green',
                                            borderColor: 'green',
                                            borderWidth: 1,
                                            fill: 'origin'

                                            
                                        },{
                                            label: 'Custom Deals',
                                            data: @json($chartdata->pluck('custom_sales')),
                                            // backgroundColor: 'green',
                                            borderColor: 'yellow',
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
                    </div>
                </div>
            </div>
        </div>
        {{-- END OF CONTENTS--}}
    </div>
{{-- END--}}

