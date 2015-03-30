<?php namespace App\Http\Controllers;


use App\Account;
use App\Client;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\FormC;

class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
            $clients = Client::all();
        return \View::make('clientlst')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function add()
    {
        $clients = Client::all()->first()->get();
        $client1 = Client::updateOrCreate(['c_id' => 'c24','password' => 'letitbe','name' => 'James Holt','email' => 'diehoping@gmail.com','address' => '675R Sheikh Zayed Road ','dob' => '1967-11-04','account_no' => '11122332','account_no' => '999999999','contact_no' => '0563439683','ni_no' => '012345678','networth' => '10000000']);
        return \View::make('clientlst')->with('clients',$clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function edit()
    {
        $clients = CLient::all();
        $client1 = Client::where('c_id','gh7')->update(['contact_no'=>'056837294']);
        $client1 = Client::where('c_id','gh7')->update(['account_no'=>'383226677']);
        $client1 = Client::where('c_id','gh7')->update(['email'=>'wth@gmail.com']);
        return \View::make('clientlst')->with('clients',$clients);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete()
    {
        $clients = CLient::all()->first()


            ->get();
        $client1 = Client::where('c_id',"c24");
        $client1->delete();
        return \View::make('clientlst')->with('clients',$clients);
    }



}
