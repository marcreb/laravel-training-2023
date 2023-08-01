<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class DashboardController extends Controller
{
    public function serve($asset)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $path = public_path('dashboard-assets/' . $asset);
        if (!file_exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        return Response::file($path);
    }
}
