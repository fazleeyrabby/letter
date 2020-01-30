@extends('layouts.user')
@section('user')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                    </ol>
                </div>
                <h4 class="page-title">Upgrade Account</h4>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($plans as $plan)
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">{{$plan->plan_name}}</h5>
                    <div class="card-body">
                        <h5 class="card-title">Amount : ${{$plan->plan_amount}}</h5>
                        <p class="card-text">{!! $plan->plan_des !!}</p>
                        <button class="btn btn-success" data-toggle="modal" data-target="#select{{$plan->id}}">select</button>
                    </div>
                </div>
            </div>





            <div class="modal fade" id="select{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Select Plan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{route('user.select.cart')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    are you sure to select this plan ?
                                    <input type="hidden" name="select_id" value="{{$plan->id}}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">select</button>
                                </div>

                    </div>
                        </form>
                </div>
            </div>
        @endforeach




    </div>



@endsection
