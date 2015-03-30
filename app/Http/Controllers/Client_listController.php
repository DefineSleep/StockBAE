<?php namespace App\Http\Controllers;


use App\Client_list;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\User;


class ClientController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $client_lists = Client_list::all();
        return \View::make('clientlst')->with('client1',$client_lists);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */



}
