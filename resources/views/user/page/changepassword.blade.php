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
                <h4 class="page-title">Change Password</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">

                <form class="parsley-examples" action="{{route('user.pass.update')}}" novalidate="" method="post">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="emailaddress">New Password</label>
                            <input class="form-control" type="text" name="n_pass"  id="emailaddress" required="" placeholder="Enter New Password" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emailaddress">Change Password</label>
                            <input class="form-control" type="text" name="c_pass"  id="emailaddress" required="" placeholder="Enter Confirm Password" >
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
