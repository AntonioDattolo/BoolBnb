<?php

namespace App\Http\Controllers;

use App\Models\Suite;
use App\Models\Sponsor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // $mainHome = apartment::select()->where('user_id',$user_id)->get();
        $data = [
            // 'apartment' => Suite::with('user')->select()->where('user_id',$user_id)->get(),
            'suite' => Suite::with(
                'user',
                'messages',
                'visuals',
                'sponsors',
                'services'
            )->select()->where('user_id', $user_id)->get()

            // 'type' => Type::all() Non è necessario in quanto recupera il nome del type attraverso la RELATIONS delle tabelle
        ];
        return view('admin.suites.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [

            'sponsor' => Sponsor::all(),
            'service' => Service::all()

        ];
        return view("admin.suites.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|min:3",
            "room" => "required|min:1",
            "bed" => "required|min:1",
            "bathroom" => "required|min:1",
            "squareM" => "required|min:1",
            "address" => "required|min:1",

            "longitude" => "nullable",
            "latitude" => "nullable",

            "img" => "required|min:3",
            "visible" => "nullable",
            "sponsor" => "nullable",
            "tot_visuals" => "required",
            "user_id" => "required"

        ]);

        $data = $request->all();
        $newSuite = new Suite;
        $newSuite->title = $data['title'];
        $newSuite->room = $data['room'];
        $newSuite->bed = $data['bed'];
        $newSuite->bathroom = $data['bathroom'];
        $newSuite->squareM = $data['squareM'];
        $newSuite->address = $data['address'];
        $newSuite->longitude = $data['longitude'];
        $newSuite->latitude = $data['latitude'];
        $newSuite->img = $data['img'];
        // $newSuite->visible = $data['visible'];
        // $newSuite->sponsor = $data['sponsor'];
        $newSuite->tot_visuals = $data['tot_visuals'];
        $newSuite->user_id = $data['user_id'];
        // if ($request->has('img')) {

        //     $image_path = Storage::put('uploads', $data['img']);
        //     $newSuite->img= $image_path; 
        // }
        // $newSuite->slug = STR::slug($newSuite->title, '-');
        // $newSuite->type_id = $data['type_id'];
        $newSuite->save();
        // $tech= isset($data['technologies']);

        // if (isset($data['technologies'])) {
        //     $newSuite->technologies()->attach($tech);
        // }else{
        //     return redirect()->route('admin.Suite.show', $newSuite->id);
        // }

        return redirect()->route('admin.suites.show', $newSuite->id);
        //NON ANDREBBE ADMIN.SUITES.INDEX ???
    }

    /**
     * Display the specified resource.
     */
    public function show(Suite $suite)
    {
        //  $selectedProject =  Project::findOrFail($id);
        //  // $selectedTech = Technology::findOrFail();
        //  $data = [
        //      "project" => $selectedProject,
        //      "technology" => $selectedProject->technologies
        //  ];
        return view(
            'admin.suites.show',
            //  $data
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suite $suite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suite $suite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suite $suite)
    {
        //
    }
}
