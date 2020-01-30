<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from coderthemes.com/abstack/layouts/green/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:42:38 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Abstack - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/dashboard/')}}/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/dashboard/')}}/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/dashboard/')}}/css/app.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg bg-gradient">

<div class="account-pages mt-5 pt-5 mb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card bg-pattern">

                    <div class="card-body p-4">

                        <div class="text-center w-75 m-auto">
                            <a href="index.html">
                                <span><img src="{{asset('assets/dashboard/')}}/images/logo-dark.png" alt="" height="18"></span>
                            </a>
                            <h5 class="text-uppercase text-center font-bold mt-4">Sign In</h5>

                        </div>

                        <form action="{{route('register')}}" method="post">
                            @csrf

                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">First Name</label>
                                    <input class="form-control" type="text" name="first_name" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Email</label>
                                    <input class="form-control" type="email" name="email" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Company</label>
                                    <input class="form-control" type="text" name="company" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Address One</label>
                                    <input class="form-control" type="text" name="address1" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Address Two</label>
                                    <input class="form-control" type="text" name="address2" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">City</label>
                                    <input class="form-control" type="text" name="city" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Country</label>
                                    <input class="form-control" type="text" name="country" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Country</label>
                                    <input class="form-control" type="text" name="email" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Country Code</label>
                                    <input class="form-control" type="text" name="country_code" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Zip</label>
                                    <input class="form-control" type="text" name="zip" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Phone</label>
                                    <input class="form-control" type="text" name="phone" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Password</label>
                                    <input class="form-control" type="password" name="password" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="emailaddress">Confirm Password</label>
                                    <input class="form-control" type="password" name="password_confirmation" id="emailaddress" required="" placeholder="Enter your email" >
                                </div>

                            </div>


                            <div class="form-group mb-0 text-center">
                                <button class="btn btn-gradient btn-block" type="submit"> Sign Up </button>
                            </div>

                        </form>

                        <div class="row mt-4">
                            <div class="col-sm-12 text-center">
                                <p class="text-muted mb-0">Already have an account? <a href="{{route('login')}}" class="text-dark ml-1"><b>Log In</b></a></p>
                            </div>
                        </div>


                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->



            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->


<!-- Vendor js -->
<script src="{{asset('assets/dashboard/')}}/js/vendor.min.js"></script>

<!-- App js -->
<script src="{{asset('assets/dashboard/')}}/js/app.min.js"></script>

</body>

<!-- Mirrored from coderthemes.com/abstack/layouts/green/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 20 Jan 2020 20:42:38 GMT -->
</html>
