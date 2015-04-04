<?php namespace App\Http\Controllers;


use App\Account;
use App\Client;
use App\Client_list;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;


use App\User;
use Illuminate\Http\FormC;


class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function form()
    {
        return view('client-form');
    }

    public function index()
    {
        $clients =  Client_list::all()->first()
            ->select('client.c_id as c_id','fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->get();
        return \View::make('clientlst')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add()
    {
        $clients =  Client_list::all()->first()
            ->select('client.c_id as c_id','fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->get();
        $client1 = Client::updateOrCreate(['c_id' => 'c24','password' => \Hash::make('letitbe'),'name' => 'James Holt','email' => 'diehoping@gmail.com','address' => '675R Sheikh Zayed Road ','dob' => '1967-11-04','account_no' => '999999999','contact_no' => '0563439683','ni_no' => '012345678','networth' => '10000000']);
        $client2 = Client_list::updateOrCreate(['fa_id' => 'qw1', 'c_id' => 'c24']);
        return \View::make('clientlst')->with('clients',$clients);
    }

    public function transfer($id)
    {
        $clients =  Client_list::all()->first()
            ->select('client.c_id as c_id','fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->get();
        $client2 = Client_list::updateOrCreate(['fa_id' => 'qw1', 'c_id' => $id]);
        return \View::make('clientlst')->with('clients',$clients);
    }

    public function edit()
    {
        $clients =  Client_list::all()->first()
            ->select('client.c_id as c_id','fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->get();
        $client1 = Client::where('c_id','sm709')->update(['contact_no'=>'056837294']);
        $client1 = Client::where('c_id','sm709')->update(['account_no'=>'383226677']);
        $client1 = Client::where('c_id','sm709')->update(['email'=>'wth@gmail.com']);
        return \View::make('clientlst')->with('clients',$clients);

    }

    public function delete($id)
    {
        $clients =  Client_list::all()->first()
            ->select('client.c_id as c_id','fa.name as fname','client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob', 'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->get();
        $client1 = Client_list::where('c_id',$id)->delete();
        $client2 = Client::where('c_id',$id)->delete();
        return \View::make('clientlst')->with('clients',$clients);
    }

}
