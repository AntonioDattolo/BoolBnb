<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suite;
use Illuminate\Http\Request;

class SuiteController extends Controller
{
    public function index()
    {
        // $suites = Suite::all();
        return response()->json([
            'success' => true,
            'results' => Suite::with('sponsor')->paginate(20)
            
            // 'suites' => Suite::with(['languages', 'type'])->orderByDesc('id')->paginate(6)
            //languages e type del 'with()' li prendi dal metodo del modello Project
        ]);
    }
}
