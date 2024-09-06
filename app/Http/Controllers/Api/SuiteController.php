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
            'results' => Suite::with('sponsor', 'services')->paginate(20)

            // 'suites' => Suite::with(['sponsor', 'services'])->orderByDesc('id')->paginate(6)
            //sponsor e services del 'with()' li prendi dal metodo del modello Suite
        ]);
    }

    public function show($slug)
    {
        $suite = Suite::with(['sponsor', 'services'])->where('slug', $slug)->first(); //con first al posto di get, ti da il primo dato non un array

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
