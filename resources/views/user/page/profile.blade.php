@extends('layouts.user')
@section('user')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('user.profile.update')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="emailaddress">First Name</label>
                            <input class="form-control" type="text" name="first_name" value="{{$user->first_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Last Name</label>
                            <input class="form-control" type="text" name="last_name" value="{{$user->last_name}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" name="email" value="{{$user->email}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Company</label>
                            <input class="form-control" type="text" name="company" value="{{$user->company}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Address One</label>
                            <input class="form-control" type="text" name="address1" value="{{$user->address1}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Address Two</label>
                            <input class="form-control" type="text" name="address2" value="{{$user->address2}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">City</label>
                            <input class="form-control" type="text" name="city" value="{{$user->city}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Country</label>
                            <input class="form-control" type="text" name="country" value="{{$user->country}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Country</label>
                            <input class="form-control" type="text" name="email" value="{{$user->email}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Country Code</label>
                            <input class="form-control" type="text" name="country_code" value="{{$user->country_code}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Zip</label>
                            <input class="form-control" type="text" name="zip" value="{{$user->zip}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Phone</label>
                            <input class="form-control" type="text" name="phone" value="{{$user->phone}}" id="emailaddress" required="" placeholder="Enter your email" >
                        </div>

                    </div>


                    <div class="form-group text-right mb-0">
                        <button class="btn btn-gradient waves-effect waves-light" type="submit">
                            Submit
                        </button>
                    </div>

                </form>
            </div> <!-- end card-box -->
        </div>
    </div>

@endsection
