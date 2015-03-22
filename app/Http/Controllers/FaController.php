<?php namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
        $fas = Admin::all()->first()

            //->where('users.name', '=', 'abc')
            ->get();
      //  $fa = Fa::updateOrCreate(['fa_id' => 'ff69','name' => 'Frankie Faison','email' => 'dirtyland@gmail.com','address' => '5th Street Near 6th ','dob' => '1969-06-09','contact_no' => '55696969','ni_no' => '012345678']);
        return \View::make('index')->with('fas',$fas);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		//LEL
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
