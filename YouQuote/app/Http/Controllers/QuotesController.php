<?php

namespace App\Http\Controllers;

use App\Models\Quotes;
use Illuminate\Http\Request;

class QuotesController extends Controller
{
    
    public function index()
    {
        return Quotes::all();
    }

    public function store(Request $request)
    {
        $request->validate(['content' => 'required|string']);
        return Quotes::create($request->all());
    }

    public function show(Quotes $quote)
    {
        return $quote;
    }

    public function update(Request $request, Quotes $quote)
    {
        $quote->update($request->all());
        return $quote;
    }

    public function destroy(Quotes $quote)
    {
        $quote->delete();
        return response()->json(['message' => 'Quote deleted']);
    }

    public function random()
    {
        return Quotes::inRandomOrder()->first();
    }

    public function filterByLength($length)
    {
        return Quotes::whereRaw('LENGTH(content) <= ?', [$length])->get();
    }

    // public function popular() {}
}
