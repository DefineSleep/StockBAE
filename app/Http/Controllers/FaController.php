<?php namespace App\Http\Controllers;

use App\Admin;
use App\Fa;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FaController extends Controller {


    public function form()
    {
        return view('fa-form');
    }

	public function index()
	{

        $fas = Fa::all();
        return \View::make('falst')->with('fas',$fas);
	}

	public function add()
	{
        $fa_id = \Request::input('fa_id');
        $password = \Request::input('password');
        $name = \Request::input('name');
        $email = \Request::input('email');
        $address = \Request::input('address');
        $dob = \Request::input('dob');
        $contact_no= \Request::input('contact_no');
        $start_date = date("Y-m-d");
       // $start_date = \Request::input('start_date');
        $salary = \Request::input('salary/hr');
        $ni_no = \Request::input('ni_no');
        $admin_id = \Request::input('admin_id');


        $fas = Fa::all()->first()->get();
        /*$fa = Fa::updateOrCreate(['fa_id' => 'ff69','password' => 'testing123','name' => 'Frankie Faison','email' => 'dirtyland@gmail.com','address' => '5th Street Near 6th ','dob' => '1969-06-09','contact_no' => '55696969','start_date' => '1980-05-04','salary/hr' => '100.69','ni_no' => '012345678','admin_id' => 'sp85']);
        return \View::make('falst')->with('fas',$fas);*/
        $fa = Fa::updateOrCreate(['fa_id' => $fa_id,'password' => \Hash::make($password),'name' => $name,'email' => $email,
            'address' => $address,'dob' => $dob,'contact_no' => $contact_no,'start_date' => $start_date,
            'salary/hr' => $salary,'ni_no' => $ni_no,'admin_id' => $admin_id]);
        return redirect('fa');
       /* return \View::make('falst')->with('fas',$fas);*/
    }

	public function edit()
	{
        $fas = Fa::all();
      //  $fa = Fa::where('fa_id','vv8')->update(['contact_no'=>'501234567']);
        $fa = Fa::updateOrCreate(['fa_id' => 'vv8','contact_no' => '55696969']);
        return redirect('fa');
        /*return \View::make('falst')->with('fas',$fas);*/
	}

	public function delete($id)
	{
        $fas = Fa::all()->first()->get();
        $fa = Fa::where('fa_id',$id);
        $fa->delete();
        return redirect('fa');
        /*return \View::make('falst')->with('fas',$fas);*/
	}

}
