<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        // dd($data);


        // 

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id) ; 

        return view('user.panel.profile.index',['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $data = $request->validate([
            'avatar' => 'sometimes',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'level_id' => 'sometimes',
            'balance' => 'sometimes',
            'user_type' => 'sometimes',
            'country' => 'sometimes',
            'city' => 'sometimes',
            'address' => 'sometimes',
            'kyc_status' => 'sometimes',
            'total_sales' => 'sometimes',
            'withdraw_method_id' => 'sometimes',
        ]);


        $profile = User::updateOrCreate(
            ['id' => $id],
            $data
        );

        dd($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
