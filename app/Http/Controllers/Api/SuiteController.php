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
            'results' => Suite::with('sponsor', 'services')->paginate(70)

            // 'results' => Suite::all()->where('id', '>', $data['num'])
            //sponsor e services del 'with()' li prendi dal metodo del modello Suite
        ]);
    }

    public function show(Request $request)
    {   
        // $request->all();
        // $data =[
        //     'id' => 1
        // ];
        // $suite = Suite::with(['sponsor', 'services'])->where('id', $data['id'])->first(); //con first al posto di get, ti da il primo dato non un array

        // if ($suite) {
        //     return response()->json([
        //         'status' => true,
        //         'suite' => $suite
        //     ]);
        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'suite not found...'
        //     ]);
        // }
    }
    public function search(Request $request)
    {   
       $data = $request->all();



        return response()->json([
            'success' => true,
            'results' => $data['lat']
            // Suite::where('id',$request)->with('sponsor', 'services')->paginate(3)

            // 'results' => Suite::all()->where('id', '>', $data['num'])
            //sponsor e services del 'with()' li prendi dal metodo del modello Suite
        ]);
    }
}
