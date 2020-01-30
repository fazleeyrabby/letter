@extends('layouts.admin')
@section('admin')
    <div class="row" xmlns="http://www.w3.org/1999/html">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#createplan">Create New</button>
                    </ol>
                </div>
                <h4 class="page-title">Plan</h4>
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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editplan{{$plan->id}}">Edit</button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteplan{{$plan->id}}">Delete</button>
                </div>
                <div class="card-footer text-muted">
                    @if($plan->plan_status == 1)
                        Active
                        @else
                    In-Active
                        @endif
                </div>
            </div>
        </div>


            <div class="modal fade" id="editplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update Plan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{route('admin.plan.update')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Plan name</label>
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}">
                                    <input type="text" class="form-control" name="plan_name" value="{{$plan->plan_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Plan Days</label>
                                    <input type="number" class="form-control" name="plan_date" value="{{$plan->plan_date}}">
                                </div>
                                <div class="form-group">
                                    <label>Plan Amount</label>
                                    <input type="text" class="form-control" name="plan_amount" value="{{$plan->plan_amount}}">
                                </div>
                                <div class="form-group">
                                    <label>Plan Description</label>
                                    <textarea type="text" cols="5" rows="5" class="form-control" name="plan_des">{!! $plan->plan_des !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Plan Amount</label>
                                    <select class="form-control" name="plan_status">
                                        <option value="0" {{$plan->plan_status == 0 ?'selected' : ''}}>select any</option>
                                        <option value="1" {{$plan->plan_status == 1 ?'selected' : ''}}>Activate</option>
                                        <option value="2" {{$plan->plan_status == 2 ?'selected' : ''}}>In-Active</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>



            <div class="modal fade" id="deleteplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Plan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{route('admin.plan.delete')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    are you sure to delete this plan ?
                                    <input type="hidden" name="plan_id_delete" value="{{$plan->id}}">
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Delete</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach




    </div>


    <div class="modal fade" id="createplan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Plan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{route('admin.plan.create')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Plan name</label>
                        <input type="text" class="form-control" name="plan_name">
                    </div>
                    <div class="form-group">
                        <label>Plan Days</label>
                        <input type="number" class="form-control" name="plan_date">
                    </div>
                    <div class="form-group">
                        <label>Plan Amount</label>
                        <input type="text" class="form-control" name="plan_amount">
                    </div>
                    <div class="form-group">
                        <label>Plan Description</label>
                        <textarea type="text" cols="5" rows="5" class="form-control" name="plan_des"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Plan Amount</label>
                        <select class="form-control" name="plan_status">
                            <option value="0">select any</option>
                            <option value="1">Activate</option>
                            <option value="2">In-Active</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
