<?php

namespace App\Http\Controllers;

use App\Models\Quotes;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Quotes::all();   
    }

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
        $request->validate(['content' => 'required|string']);
        return Quotes::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotes $quotes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotes $quotes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotes $quotes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotes $quotes)
    {
        //
    }
}
