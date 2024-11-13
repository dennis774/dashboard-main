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
                            <canvas id="myChart" width="400" height="200"></canvas>
                        </div>



                        <script>
                                var ctx = document.getElementById('myChart').getContext('2d');
                                var myChart = new Chart(ctx, {
                                    type: 'line',
                                    data: {
                                        labels: @json($chartdata->pluck('date')),
                                        datasets: [{
                                            label: 'Print/Photo',
                                            data: @json($chartdata->pluck('print_expenses')),
                                            // backgroundColor: 'green',
                                            borderColor: 'blue',
                                            borderWidth: 1,
                                            fill: 'origin'

                                            
                                        },{
                                            label: 'UdD Merch',
                                            data: @json($chartdata->pluck('merch_expenses')),
                                            // backgroundColor: 'green',
                                            borderColor: 'green',
                                            borderWidth: 1,
                                            fill: 'origin'

                                            
                                        },{
                                            label: 'Custom Deals',
                                            data: @json($chartdata->pluck('custom_expenses')),
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

