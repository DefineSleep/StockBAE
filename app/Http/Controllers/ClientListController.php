<?php namespace App\Http\Controllers;

use App\Account;
use App\Client;
use App\Client_list;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


use Illuminate\Http\Request;

class ClientListController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    public function form()
    {
        return view('faclient-form');
    }

	public function index($fid)
	{
        $clients =  Client_list::all()->first()
            ->select('client.c_id','fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->where('fa.fa_id',$fid)->get();
        return \View::make('faclientlst')->with('clients',$clients);
	}

	public function add()
	{
        $c_id = \Request::input('c_id');
        $password = \Request::input('password');
        $name = \Request::input('name');
        $email = \Request::input('email');
        $address = \Request::input('address');
        $dob = \Request::input('dob');
        $contact_no= \Request::input('contact_no');
        $account_no = \Request::input('account_no');
        $ni_no = \Request::input('ni_no');
        $fa_id = \Request::input('fa_id');

        /*$clients = Client_list::all()->first()->where('fa_id',$fid);
        $client1 = Client::updateOrCreate(['c_id' => 'c24','password' => 'letitbe','name' => 'James Holt','email' => 'diehoping@gmail.com','address' => '675R Sheikh Zayed Road ','dob' => '1967-11-04','account_no' => '11122332','account_no' => '999999999','contact_no' => '0563439683','ni_no' => '012345678','networth' => '10000000']);
        $client2 = Client_list::updateOrCreate(['fa_id' => 'qw1', 'c_id' => 'c24']);
        return \View::make('faclientlst')->with('clients',$clients);*/

        $acc = Account::updateOrCreate(['account_no' => $account_no, 'amount' => '100000']);
        $client = Client::updateOrCreate(['c_id' => $c_id,'password' => \Hash::make($password),'name' => $name,'email' => $email,
            'address' => $address,'dob' => $dob,'account_no' => $account_no,'contact_no' => $contact_no,'ni_no' => $ni_no,'networth' => '0']);
        $client_list = Client_list::updateOrCreate(['fa_id' => $fa_id, 'c_id' => $c_id]);

        return \Redirect::route('faclient', ['id' => $fa_id]);
	}


	public function edit($fid, $cid)
	{
        $clients = Client_list::all()->first()->where('fa_id',$fid);
        $client1 = Client::where('c_id','sm709')->update(['contact_no'=>'056837294']);
        return \View::make('faclientlst')->with('clients',$clients);
	}

    /**
     * Delete ONLY from client_list
     */
	public function delete($cid)
	{
        $clients = Client_list::all()->first()->where('fa_id','zx5');
        $client2 = Client_list::where('c_id',$cid)->delete();
        return \Redirect::route('faclient', ['id' => 'zx5']);
        /*return \View::make('faclientlst')->with('clients',$clients);*/
	}

}
