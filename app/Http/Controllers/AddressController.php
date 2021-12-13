<?php

namespace App\Http\Controllers;

use App\Models\CustomerAddress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = DB::table('users')->where('id', $id)->value('id');
        $address = DB::table('customer_addresses')->where('user_id', $user)->get('address');

        return response()->json([
            'Status' => true,
            'Message' => 'success',
            'Data' => $address
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $user = DB::table('users')->where('id', $id)->value('id');

        $data = [
            'user_id' => $user,
            'address' => $request->address,
        ];

        $address = CustomerAddress::create($data);
        return response()->json([
            'data' => [
                'status' => 200,
                'message' => 'success',
                'data' => $address
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $addressId)
    {
        $user = DB::table('users')->where('id', $id)->value('id');
        $address = DB::table('customer_addresses')->where('user_id', $user)->get('address');

        return response()->json([
            'data' => [
                'status' => 200,
                'message' => 'success',
                'address' => $address
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId, $addressId)
    {
        $user = DB::table('users')->where('id', $userId)->value('id');
        $address = DB::table('customer_addresses')->where('user_id', $user)->get();
        // $addressId = DB::table('customer_addresses')->where('id', $user)->get()->all();

        return response()->json([
            'data' => [
                'status' => 200,
                'message' => 'success',
                'address' => $address
            ]
        ]);
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
        // $user = DB::table('users')->where('id', $id)->value('id');
        // $address = DB::table('customer_addresses')->where('user_id', $user)->value('address')


        // $data = [
        //     'user_id' => $user,
        //     'address' => $request->address,
        // ];

        // // $address = DB::update('update customer_addresses set votes = 100 where name = ?', ['John']);
        // return response()->json([
        //     'data' => [
        //         'status' => 200,
        //         'message' => 'success',
        //         'data' => $address
        //     ]
        // ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerAddress = CustomerAddress::find($id);

        $customerAddress->delete();

        return response()->json([
            'data' => [
                'status' => 200,
                'message' => 'This customer address has been deleted',
                'user' => $customerAddress
            ]
        ]);
    }
}
