<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\pdf_file;
use App\plan;
use App\User;

use App\user_archive;
use App\user_plan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\Customer;
use Yajra\DataTables\Facades\DataTables;

class UserProfileController extends Controller
{
    public function profile()
    {
        $user = User::where('id',Auth::user()->id)->first();
        return view('user.page.profile',compact('user'));
    }

    public function profile_update(Request $request)
    {
        $data = $request->all();
        $user = User::where('id',Auth::user()->id)->first();
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

    public function updrade()
    {
        $plans = plan::where('plan_status',1)->get();
        return view('user.page.upgrade',compact('plans'));
    }

    public function select_cart_save(Request $request)
    {
        $plan = $request->select_id;
        return redirect(route('user.payment',$plan));
    }

    public function payment($am)
    {
        $amount = plan::where('id',$am)->first();
        return view('user.page.payment',compact('amount'));
    }

    public function stripe_pay(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripe = Stripe::charges()->create([
            'source' => $request->get('tokenId'),
            'currency' => 'USD',
            'amount' => $request->get('amount') * 1500
        ]);

        if ($stripe['status'] == 'succeeded'){
            return redirect()->back();
        }else{
            return 'paisi';
        }

//        return $stripe;

    }

    public function user_pay_save(Request $request)
    {

        $user = new user_plan();
        $user->user_id = Auth::user()->id;
        $user->plan_id = $request->plan;
        $user->plandate = Carbon::now('Asia/Dhaka')->addMinutes(3);
        $user->save();


        return 'success';

    }

    public function user_pdf()
    {

            return view('user.page.pdf');
    }

    public function user_pdf_get()
    {
        $user_data = user_plan::where('user_id',Auth::user()->id)->orderBy('id','desc')->first();
        $date = Carbon::now('Asia/Dhaka');
        if ($user_data && $date < $user_data->plandate){
            $pdf = pdf_file::where('member',2)->get();
            return DataTables::of($pdf)
                ->addColumn('action', function ($pdf) {
                    return ' <a href="'.URL::to('/'.$pdf->pdf_file).'" target="_blank"> <button class="btn btn-primary btn-info btn-sm" ><i class="far fa-eye"></i> </button></a>
                            <a href="'.route('user.archives.save',$pdf->id).'" target="_blank"> <button class="btn btn-primary btn-info btn-sm" ><i class="fas fa-archive"></i> </button></a>';
                })
                ->make(true);
        }else{
            $pdf = pdf_file::where('member',1)->get();
            return DataTables::of($pdf)
                ->addColumn('action', function ($pdf) {
                    return '  <a href="'.URL::to('/'.$pdf->pdf_file).'" target="_blank"> <button class="btn btn-primary btn-info btn-sm"><i class="far fa-eye"></i> </button></a>
                              <a href="'.route('user.archives.save',$pdf->id).'" target="_blank"> <button class="btn btn-primary btn-info btn-sm" ><i class="fas fa-archive"></i> </button></a>';
                })
                ->make(true);
        }


    }
    public function my_archives_save($id)
    {
        $ar = new user_archive();
        $ar->user_id = Auth::user()->id;
        $ar->pdf_id = $id;
        $ar->save();

        return back()->with('success','archived');
    }

    public function change_password()
    {
        return view('user.page.changepassword');
    }

    public function change_password_save(Request $request)
    {
        $npass = $request->n_pass;
        $cpass = $request->c_pass;
        if ($npass != $cpass)
        {
            return back()->with('alert','Password Not Match');
        }else{
            $user = User::where('id',Auth::user()->id)->first();
            $user->password = Hash::make($npass);
            $user->save();
            return back()->with('success','Password Changed');
        }
    }

    public function my_archives()
    {
        return view('user.page.myarchive');
    }

    public function my_archives_get()
    {
        $pdf = user_archive::where('user_id',Auth::user()->id)->with('pdf')->get();
        return DataTables::of($pdf)
            ->addColumn('action', function ($pdf) {
                return '  <a href="'.URL::to('/'.$pdf->pdf->pdf_file).'" target="_blank"> <button class="btn btn-primary btn-info btn-sm"><i class="far fa-eye"></i> </button></a>';
            })
            ->make(true);
    }
}
