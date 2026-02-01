<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        return response()->json(Review::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductId'=>'required|integer',
            'CustId'=>'required|integer',
            'Rating'=>'required|numeric|min:1|max:5',
            'Comment'=>'nullable|string',
        ]);

        $review = Review::create($request->all());
        return response()->json($review,201);
    }
}
