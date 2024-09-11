<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Suite;

use Illuminate\Http\Request;

class SuiteController extends Controller
{
    public function index()
    {
        // $suites = Suite::all();
        return response()->json([
            'success' => true,
            'results' => Suite::with('sponsors', 'services')->paginate(70)
        ]);
    }

    public function latest()
    {
        return response()->json([
            'success' => true,
            'results' => Suite::with('sponsors', 'services')->where('sponsor', 1)->get()
        ]);
    } 

    public function show($slug)
    {
        $suite = Suite::where('slug', $slug)->first();

        if ($suite) {
            return response()->json([
                'status' => true,
                'results' => $suite
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'suite not found...'
            ]);
        }
    }

    
    public function search(Request $request, Suite $suite)
    {
        $data = $request->query->all();
        // dd($data);
        $latitude_from_front = $data['latitude'];

        $longitude_from_front =  $data['longitude'];

        function radiusSearch( $latitude_from_front, $longitude_from_front){
            $radius = 20;
            return  Suite::with('sponsors', 'services')
            ->where(DB::raw('111.1111 * DEGREES(ACOS(COS(RADIANS(' . $latitude_from_front . ')) * COS(RADIANS(suites.latitude)) * COS(RADIANS(' . $longitude_from_front . ' -suites.longitude)) +
             SIN(RADIANS(' . $latitude_from_front . ')) * SIN(RADIANS(suites.latitude))))'), '<=', $radius)
                            ->get();
        }

        $data = radiusSearch($latitude_from_front, $longitude_from_front);

        return response()->json([
            'success' => true,
            'results' => $data
        ]);
    }
}
