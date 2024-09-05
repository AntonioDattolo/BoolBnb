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

    public function show($slug)
    {
        $suite = Suite::with(['sponsor'])->where('slug', $slug)->first(); //con first al posto di get, ti da il primo dato non un array

        if ($suite) {
            return response()->json([
                'status' => true,
                'suite' => $suite
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'suite not found...'
            ]);
        }
    }
}
