<?php namespace App\Http\Controllers;

use App\Client;
use App\Client_list;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ClientListController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index($fid)
	{
        $clients =  Client_list::all()->first()
            ->select('fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')->where('fa_id',$fid);
        return \View::make('faclientlst')->with('clients',$clients);
	}

	public function add($fid)
	{
        $clients = Client_list::all()->first()->where('fa_id',$fid);
        $client1 = Client::updateOrCreate(['c_id' => 'c24','password' => 'letitbe','name' => 'James Holt','email' => 'diehoping@gmail.com','address' => '675R Sheikh Zayed Road ','dob' => '1967-11-04','account_no' => '11122332','account_no' => '999999999','contact_no' => '0563439683','ni_no' => '012345678','networth' => '10000000']);
        $client2 = Client_list::updateOrCreate(['fa_id' => 'qw1', 'c_id' => 'c24']);
        return \View::make('faclientlst')->with('clients',$clients);
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
	public function delete($fid,$cid)
	{
        $clients = Client_list::all()->first()->where('fa_id',$fid);
        $client2 = Client_list::where('c_id',$cid)->delete();
        return \View::make('faclientlst')->with('clients',$clients);
	}

}
