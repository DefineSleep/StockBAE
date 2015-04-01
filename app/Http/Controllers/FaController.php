<?php namespace App\Http\Controllers;

use App\Admin;
use App\Fa;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;

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
        $fas = Fa::all()->first()

            //->where('users.name', '=', 'abc')
            ->get();
        $fa = Fa::updateOrCreate(['fa_id' => 'ff69','password' => 'testing123','name' => 'Frankie Faison','email' => 'dirtyland@gmail.com','address' => '5th Street Near 6th ','dob' => '1969-06-09','contact_no' => '55696969','start_date' => '1980-05-04','salary/hr' => '100.69','ni_no' => '012345678','admin_id' => 'sp85']);
        return \View::make('falst')->with('fas',$fas);
    }

	public function edit()
	{
        $fas = Fa::all();
      //  $fa = Fa::where('fa_id','vv8')->update(['contact_no'=>'501234567']);
        $fa = Fa::updateOrCreate(['fa_id' => 'vv8','contact_no' => '55696969']);
        return \View::make('falst')->with('fas',$fas);
	}

	public function delete($id)
	{
        $fas = Fa::all()->first()->get();
        $fa = Fa::where('fa_id',$id);
        $fa->delete();
        return \View::make('falst')->with('fas',$fas);
	}

}
