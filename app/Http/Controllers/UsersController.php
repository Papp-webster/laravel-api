<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = DB::table('user')->get();
        return view('welcome', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function publisherUsers($id)
    {
        $publishers = DB::table('db_publisher')
        ->join('user', 'db_publisher.id', '=', 'user.db_publisher_id')
        ->where('db_publisher.id', '=', $id)
        ->get();

        return $publishers;
    }

    /**
     * Display the specified resource.
     *
     * 
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = DB::table('user')->get();
        return $users;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  str  $q
     * @return \Illuminate\Http\Response
     */

    public function search($q)
    {
        
        $search = DB::table('user')
        ->where('name', 'like', '%'. $q .'%')
        ->orWhere('name_last', 'like', '%' . $q . '%')
        ->orWhere('email', 'like', '%' . $q . '%')
        ->orWhere('address_city', 'like', '%' . $q . '%')
        ->orderby('registration_date', 'desc')
        ->get();
        
        return $search;
    }
}
