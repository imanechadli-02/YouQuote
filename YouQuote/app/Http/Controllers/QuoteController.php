<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return Quote::all();
    }

    public function show($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->increment('popularity');
        return $quote;
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'author' => 'nullable|string'
        ]);

        return Quote::create([
            'content' => $request->content,
            'author' => $request->author,
            'popularity' => 0
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'sometimes|required|string',
            'author' => 'nullable|string'
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update($request->only('content', 'author'));
        return $quote;
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();
        return response()->json(['message' => 'Quote deleted']);
    }

    public function random()
    {
        return Quote::inRandomOrder()->first();
    }

    public function filterByLength(Request $request)
    {
        $maxWords = $request->query('words'); // Exemple : ?words=10

        if (!$maxWords || !is_numeric($maxWords)) {
            return response()->json(['error' => 'Le paramètre "words" est requis et doit être un entier.'], 400);
        }

        return Quote::all()->filter(function ($quote) use ($maxWords) {
            $wordCount = str_word_count($quote->content);
            return $wordCount <= $maxWords;
        })->values();
    }

    public function popular(Request $request)
    {
        $limit = $request->query('limit', 10); // Par défaut, retourner les 10 plus populaires

        return Quote::orderBy('popularity', 'desc')
            ->take($limit)
            ->get();
    }
}
