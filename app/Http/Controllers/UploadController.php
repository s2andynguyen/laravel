<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $url = '';
        if ($request->hasFile('file')) {
            $name = $request->file('file')->getClientOriginalName();
            $request->file('file')->storeAs('public/product-image', $name);
            $url = '/storage/product-image/' . $name;
        }

        if ($url) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }
        return response()->json(['error' => true]);
    }
}
