<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Manage Users</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ url('assets/css/style1.css') }}" rel="stylesheet" /> --}}
    <script src="{{ url('assets/js/chart.js') }}"></script>
    <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <script src="{{ url('assets/js/bootstrap.bundle.min.js') }}"></script>
    <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}" />
</head>
<style>
    body{
    background-image: url('https://t4.ftcdn.net/jpg/07/94/30/45/360_F_794304521_O4o0Y5UrvKtDxBNHY9utMowV2VhuhRpk.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    backdrop-filter: blur(25px); /* Optional: adds blur effect */
    min-height: 100vh; /* Ensures it covers the full viewport height */
}
h3.createHeader, h3.targetHeader{
    color: #fff;
}
i.backTarget{
    color: #fff;
}


/* Style for the form container */
form {
    padding: 20px;
    color: #fff; /* White text color */
   
}


/* Style for labels */
form label {
    color: #fff; /* White color for labels */
    font-weight: bold;
}


/* Style for form control elements */
form .form-control {
    background: transparent; /* Transparent background */
    color: #fff; /* White text color */
    border: none; /* Remove border */
    border-bottom: 1px solid #fff; /* White underline */
    border-radius: 0; /* Remove border radius */
    box-shadow: none; /* Remove default shadow */
}


/* Style for form control elements on focus */
form .form-control:focus {
    box-shadow: none; /* Remove focus shadow */
    outline: none; /* Remove outline */
    border-bottom: 1px solid #fff; /* Keep white underline on focus */
    background: transparent;
}


/* Style for the submit button */
form .btn-success {
    color: #fff;
    background: rgba(255, 255, 255, 0.2);
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
    border-radius: 10px;
    border:none;
   
}


form .btn-success:hover {
    background: rgba(255, 255, 255, 0.3);
}
.button-container {
    text-align: center; /* Center-aligns the button */
    margin-top: 15px; /* Optional: Adds space above the button */
}




</style>


<body>
    <div class="container">


        <div class="row">
            <div class="col-lg-4 mt-4 ">
                <a href="{{ route('targetSales.index') }}"><i class="fa-solid fa-arrow-left backTarget"></i></a>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-center ">
                <h3 class="targetHeader">Financial Targets</h3>
            </div>
            <div class="col-lg-4 mt-4 d-flex justify-content-end ">
            </div>
        </div>


        <div class="row mt-5">
           
            <div class="col-lg-12 d-flex justify-content-center">
                <h3 class="createHeader">Budget Allocation</h3>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-lg-3"></div>


            <div class="col-lg-6">
                <form action="{{ route('budgetAllocations.store') }}" method="POST">
                    @csrf


                    <div class="form-group mb-3">
                        <label for="business_type">Business Type</label>
                        <select name="business_type" id="business_type" class="form-control" required>
                            <option value="" disabled selected>Select Business</option>
                            <option value="UdDesign">UdDesign</option>
                            <option value="Kuwago1">Kuwago1</option>
                            <option value="Kuwago2">Kuwago2</option>
                        </select>
                    </div>


                    <div class="form-group mb-3">
                        <label for="amount">Amount</label>
                        <input type="number" name="amount" id="amount" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="start_date">Start Date</label>
                        <input type="date" name="start_date" id="start_date" class="form-control custom-date" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="end_date">End Date</label>
                        <input type="date" name="end_date" id="end_date" class="form-control custom-date" required>
                    </div>                    
                    <div class="button-container">
                        <button type="submit" class="btn btn-success mt-3">Create Allocation</button>
                    </div>
                </form>
            </div>


            <div class="col-lg-3"></div>




           
        </div>


    </div>
   
</body>
</html>