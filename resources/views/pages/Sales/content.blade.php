    {{-- START --}}
    <div class="container text-center">
        <div class="row mb-5">
            {{-- START OF SIDE BAR --}}
            <div class="col-lg-1">
                <div class="container">
                    <div class="row">
                        @include('general.sidebar')
                    </div>
                </div>
            </div>
            {{-- END OF SIDE BAR --}} {{-- START OF CONTENTS--}}
            <div class="col-lg-11 p-3 contents">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <canvas id="myChart1" width="400" height="200"></canvas>
                        </div>
                        <div class="col-lg-6">
                            <p><i class="fa-solid fa-peso-sign"></i>P{{$totalSales}}</p>
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
                                            label: 'Sales',
                                            data: @json($chartdata->pluck('sales')),
                                            // backgroundColor: 'green',
                                            borderColor: 'green',
                                            borderWidth: 5,
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

