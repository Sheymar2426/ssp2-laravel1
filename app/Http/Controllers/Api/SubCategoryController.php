<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index()
    {
        return response()->json(SubCategory::all());
    }

    public function show($id)
    {
        $sub = SubCategory::find($id);
        if(!$sub){
            return response()->json(['message'=>'SubCategory not found'],404);
        }
        return response()->json($sub);
    }
}
