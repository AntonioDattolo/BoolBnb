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
    public function search(Request $request, Suite $suite)
    {   
       $data = $request->all();
    //    $latitude1= $data['lat']; 
    //    $longitude1= $data['lng']
    //    $latitude2=  
    //    $longitude2=        function getDistanceBetweenPointsNew($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'kilometers') {
    //     $theta = $longitude1 - $longitude2; 
    //     $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta))); 
    //     $distance = acos($distance); 
    //     $distance = rad2deg($distance); 
    //     $distance = $distance * 60 * 1.1515; 
    //     switch($unit) { 
    //       case 'miles': 
    //         break; 
    //       case 'kilometers' : 
    //         $distance = $distance * 1.609344; 
    //     } 
    //     return (round($distance,2)); 
    //   }



        return response()->json([
            'success' => true,
            'results' => $data
            // Suite::where('id',$request)->with('sponsor', 'services')->paginate(3)

            // 'results' => Suite::all()->where('id', '>', $data['num'])
            //sponsor e services del 'with()' li prendi dal metodo del modello Suite
        ]);
    }
}
