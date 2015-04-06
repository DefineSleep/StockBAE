<?php namespace App\Http\Controllers;


use App\Account;
use App\Client;
use App\Client_list;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use App\User;


class ClientController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function form()
    {
        return view('client-form');
    }

    public function editform($id)
    {
        $client = Client_list::all()->first()
            ->select('client.c_id as c_id', 'client.password as password', 'fa.fa_id as fa_id', 'fa.name as fname',
                'client.name as cname', 'client.email as email', 'client.address as address', 'client.dob as dob',
                'client.account_no as account_no', 'client.ni_no as ni_no', 'client.contact_no as contact_no',
                'account.amount as acc_bal', 'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('account', 'client.account_no', '=', 'account.account_no')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')
            ->where('client.c_id', '=', $id)->get();

        return \View::make('editclient-form')->with('client', $client);
    }

    public function index()
    {
        $clients = Client_list::all()->first()
            ->select('client.c_id as c_id', 'fa.name as fname', 'client.name as cname',
                'client.email as email', 'client.address as address', 'client.dob as dob',
                'client.account_no as account_no', 'client.ni_no as ni_no', 'client.contact_no as contact_no',
                'account.amount as acc_bal', 'networth')
            ->join('client', 'client_list.c_id', '=', 'client.c_id')
            ->join('account', 'client.account_no', '=', 'account.account_no')
            ->join('fa', 'client_list.fa_id', '=', 'fa.fa_id')->get();
        return \View::make('clientlst')->with('clients', $clients);
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
        $contact_no = \Request::input('contact_no');
        $account_no = \Request::input('account_no');
        $ni_no = \Request::input('ni_no');
        $fa_id = \Request::input('fa_id');


        $acc = Account::updateOrCreate(['account_no' => $account_no, 'amount' => '100000']);
        $client = Client::updateOrCreate(['c_id' => $c_id, 'password' => \Hash::make($password), 'name' => $name, 'email' => $email,
            'address' => $address, 'dob' => $dob, 'account_no' => $account_no, 'contact_no' => $contact_no, 'ni_no' => $ni_no, 'networth' => '100000']);
        $client_list = Client_list::updateOrCreate(['fa_id' => $fa_id, 'c_id' => $c_id]);

        return redirect('client');
    }

    public function transfer($id)
    {
        $client2 = Client_list::updateOrCreate(['fa_id' => 'qw1', 'c_id' => $id]);

        return redirect('client');
    }

    public function edit()
    {
        /*$client1 = Client::where('c_id',$id)->update(['contact_no'=>'111111111']);
        return redirect('client');*/

        $c_id = \Request::input('c_id');
        $password = \Request::input('password');
        $name = \Request::input('name');
        $email = \Request::input('email');
        $address = \Request::input('address');
        $dob = \Request::input('dob');
        $contact_no = \Request::input('contact_no');
        $account_no = \Request::input('account_no');
        $ni_no = \Request::input('ni_no');
        $fa_id = \Request::input('fa_id');

        $password = \Hash::make($password);


        $check_acc = Account::all()->first()
            ->select('amount')
            ->where('account_no', '=',$account_no )
            ->get();

        $checking = $check_acc->toArray();
        $check_acc = array_filter($checking);

        if (empty($check_acc)){
        $acc = Account::updateOrCreate(['account_no' => $account_no, 'amount' => '100000']);
    }

        \DB::update("update client set password = '$password',name ='$name' , email = '$email',
           address = '$address' , dob = '$dob', account_no = '$account_no', contact_no = '$contact_no',
           ni_no = '$ni_no' where c_id = '$c_id'");
        /*$client = Client::updateOrCreate(['c_id' => $c_id,'password' => $password,'name' => $name,'email' => $email,
            'address' => $address,'dob' => $dob,'account_no' => $account_no,'contact_no' => $contact_no,
            'ni_no' => $ni_no,'networth' => '100000']);*/

        $check_client_list = Client_list::all()->first()
            ->select('fa_id')
            ->where('c_id', '=',$c_id )
            ->get();
        $checking = $check_client_list->toArray();
        $check_client_list = array_filter($checking);

        if (empty($check_client_list)){

            $client_list = Client_list::updateOrCreate(['fa_id' => $fa_id, 'c_id' => $c_id]);
            return redirect('client');
        }

        \DB::update("update client_list set fa_id = '$fa_id' where c_id = '$c_id '");

        return redirect('client');

    }

    public function delete($id)
    {

        $client1 = Client_list::where('c_id', $id)->delete();
        $client3 = Client::where('c_id', $id)->delete();
        /* $clientacc = Client::all('account_no')->where('c_id',$id);
         $acc = Account::where('account_no',$clientacc)->delete();*/

        return redirect('client');
    }

}
