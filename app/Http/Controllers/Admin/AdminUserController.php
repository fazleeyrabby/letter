<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\plan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
{
    public function users()
    {
        return view('admin.users.user');
    }

    public function import_file(Request $request)
    {


        Excel::import(new UsersImport,request()->file('im_file'));

        $users = User::all();
        foreach ($users as $user){
            $us = User::where('id',$user->id)->first();
            $us->password = Hash::make('12345678');
            $us->save();
        }
        return back()->with('success','Cvs Import Successfull');
    }

    public function export_file()
    {
        return Excel::download(new UsersExport, 'users.csv');
    }

    public function users_get()
    {
        $users = User::all();
        return DataTables::of($users)
            ->addColumn('action', function ($users) {
                return ' <a href="'.route('admin.edit.user',$users->id).'"> <button class="btn btn-success btn-info btn-sm"><i class="fas fa-eye"></i> </button></a>
                        <button id="' . $users->id . '" onclick="deleteuser(this.id)" class="btn btn-danger btn-info btn-sm" data-toggle="modal" data-target="#deleteuser"><i class="far fa-trash-alt"></i> </button>';
            })
            ->make(true);
    }


    public function edit_user($id)
    {
        $user = User::where('id',$id)->first();
        return view('admin.users.useredit',compact('user'));
    }

    public function edit_user_update(Request $request)
    {
        $user = User::where('id',$request->edit_user)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->company = $request->company;
        $user->address1 = $request->address1;
        $user->address2 = $request->address2;
        $user->city = $request->city;
        $user->country = $request->country;
        $user->email = $request->email;
        $user->country_code = $request->country_code;
        $user->zip = $request->zip;
        $user->phone = $request->phone;
        $user->save();

        return back()->with('success','Profile Updated');
    }

    public function edit_user_delete(Request $request)
    {
        $user = User::where('id',$request->deleteuser)->first();
        $user->delete();
        return back()->with('success','User Deleted');
    }

    public function plans()
    {
        $plans = plan::all();
        return view('admin.plans.plan',compact('plans'));
    }

    public function plans_create(Request $request)
    {
        $plan = new plan();
        $plan->plan_name = $request->plan_name;
        $plan->plan_date = $request->plan_date;
        $plan->plan_amount = $request->plan_amount;
        $plan->plan_des = $request->plan_des;
        $plan->plan_status = $request->plan_status;
        $plan->save();

        return back()->with('success','Plan Created');
    }

    public function plans_update(Request $request)
    {
        $plan = plan::where('id',$request->plan_id)->first();
        $plan->plan_name = $request->plan_name;
        $plan->plan_date = $request->plan_date;
        $plan->plan_amount = $request->plan_amount;
        $plan->plan_des = $request->plan_des;
        $plan->plan_status = $request->plan_status;
        $plan->save();

        return back()->with('success','Plan Updated');
    }

    public function plans_delete(Request $request)
    {
        $plan_del = plan::where('id',$request->plan_id_delete)->first();
        $plan_del->delete();
        return back()->with('success','Plan Deleted');
    }
}
