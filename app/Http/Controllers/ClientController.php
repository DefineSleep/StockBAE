<?php namespace App\Http\Controllers;


use App\Account;
use App\Client;
use App\Client_list;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;


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
            ->select('client.c_id as c_id','fa.name as fname','client.name as cname',
                'client.email as email', 'client.address as address', 'client.dob as dob',
                'client.account_no as account_no','client.ni_no as ni_no','client.contact_no as contact_no' ,
                'account.amount as acc_bal','networth')

            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('account', 'client.account_no', '=', 'account.account_no')
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


        $acc = Account::updateOrCreate(['account_no' => $account_no, 'amount' => '100000']);
        $client = Client::updateOrCreate(['c_id' => $c_id,'password' => \Hash::make($password),'name' => $name,'email' => $email,
            'address' => $address,'dob' => $dob,'account_no' => $account_no,'contact_no' => $contact_no,'ni_no' => $ni_no,'networth' => '100000']);
        $client_list = Client_list::updateOrCreate(['fa_id' => $fa_id, 'c_id' => $c_id]);

        return redirect('client');
    }

    public function transfer($id)
    {
        $client2 = Client_list::updateOrCreate(['fa_id' => 'qw1', 'c_id' => $id]);

        return redirect('client');
    }

    public function edit($id)
    {
        $client1 = Client::where('c_id',$id)->update(['contact_no'=>'056837294']);
        $client1 = Client::where('c_id',$id)->update(['account_no'=>'383226677']);
        $client1 = Client::where('c_id',$id)->update(['email'=>'wth@gmail.com']);

        return redirect('client');

    }

    public function delete($id)
    {

        $client1 = Client_list::where('c_id',$id)->delete();
        $client3 = Client::where('c_id',$id)->delete();
       /* $clientacc = Client::all('account_no')->where('c_id',$id);
        $acc = Account::where('account_no',$clientacc)->delete();*/

        return redirect('client');
    }

}
