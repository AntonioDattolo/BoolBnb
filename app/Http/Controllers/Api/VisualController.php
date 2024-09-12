<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Suite;
use App\Models\Visual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Validator;

class VisualController extends Controller
{
    //
    // public function index() {
    //     return response()->json([
    //         'success' => true,
    //         'results' => Visual::all(),
    //     ]);

       
    // }

    public function store(Request $request) {
        // 
        // $suite = Suite::where('slug', $slug)->first();
        $data = $request->all();
        $data['date'] = now();

        $validator = FacadesValidator::make($data, [
            'ip_address' => 'required',
            'suite_id' => 'required',
            // 'date' => 'nullable', 
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ]);
        }
        
        $new_visual = new Visual();
        $new_visual->fill($data);
        $new_visual->save();
        // $new_visual = Visual::create([
        //     'ip_address' => $data->visuals->ip_address,
        //     'suite_id' => $data->visuals->suite_id,
        //     'date' => now(),
        // ]) ;
        // $new_visual->save();

        return response()->json([
            'success' => true,
            'results' => $data, 'bella', 
        ]);
    
       
        // return response()->json([
        //     'success' => true,
        //     'message' => "FATTO",
        // ], 200);

        // if ($new_visual) {
        //     # code...
        // }else {
            // return response()->json([
            //     'status' => 500,
            //     'message' => 'nadaaaa',
            // ], 500);
        // }
    }
}
