<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class AdminSubCategoryController extends Controller
{
    public function index()
    {
        return SubCategory::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'SubCategoryName' => 'required|string',
            'CategoryId' => 'required|integer|exists:category,CategoryId'
        ]);

        $sub = SubCategory::create($request->all());
        return response()->json($sub, 201);
    }

    public function show($id)
    {
        return SubCategory::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $sub = SubCategory::findOrFail($id);
        $sub->update($request->all());
        return response()->json($sub);
    }

    public function destroy($id)
    {
        SubCategory::destroy($id);
        return response()->json(['message'=>'Deleted successfully']);
    }
}
