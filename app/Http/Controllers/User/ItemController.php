<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['categories'] = Category::all();
        return view('user.panel.item.index', $data);
    }


    public function categoryStore(Request $request)
    {
        $data = $request->validate([
            'category' => 'required'
        ]);
        $data['category'] = Category::where('slug', $data['category'])->firstOrFail();
        return view('user.panel.item.create', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $data['categories'] = Category::all();
        // return view('user.panel.item.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
