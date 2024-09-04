<?php

namespace App\Http\Controllers;

use App\Models\Suite;
use App\Models\Sponsor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// use Geocoder\Collection;
// use Geocoder\IntegrationTest\BaseTestCase;
// use Geocoder\Location;
// use Geocoder\Provider\TomTom\TomTom;
// use Geocoder\Query\GeocodeQuery;
// use Geocoder\Query\ReverseQuery;

class SuiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        $data = [
            'suite' => Suite::with(
                'user',
                'messages',
                'visuals',
                'sponsors',
                'services'
            )->select()->where('user_id', $user_id)->get()
        ];
        return view('admin.suite.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'sponsor' => Sponsor::all(),
            'service' => Service::all(),
            'user' => Auth::user()->id
        ];
        return view("admin.suite.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            "title" => "required|min:5",
            "room" => "required|min:1|between:1,20",
            "bed" => "required|min:1|between:1,20",
            "bathroom" => "required|min:1|between:1,10",
            "squareM" => "required|integer|min:25",
            "address" => "required|min:8",
            "img" => "required",
            "visible" => "nullable",
            "sponsor" => "nullable",
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->title, '-');
        $newSuite = new Suite;
        $newSuite->title = $data['title'];
        $newSuite->room = $data['room'];
        $newSuite->bed = $data['bed'];
        $newSuite->bathroom = $data['bathroom'];
        $newSuite->squareM = $data['squareM'];

        // $newSuite->address = $data['address'] . ',' . $data['civic']  . ',' . $data['city'] . ',' . $data['cap'];
        $newSuite->address = $data['address'];
        // explode(',',$newSuite->address);

        // ----------------->>>>GEOCODIFICA INDIRIZZO<<<<<--------------------------
        // PRIMO STEP 
        // INSTALLARE LE DIPENDENZE DA TERMINALE
        // ----> composer require geocoder-php/tomtom-provider guzzlehttp/guzzle
        // REGISTRARSI SUL SITO TOMTOM PER OTTENERE LA KEY PER L'API  ----> https://developer.tomtom.com/
        // $address =  $data['address'] . ' ' . $data['civic']  . ' ' . $data['city'] . ' ' . $data['cap'];
        $address =  $data['address'];
        // istanza client guzzle
        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);
        // richiesta api delle coordinate
        // $response = $client->get('https://api.tomtom.com/search/2/geocode/' . urlencode($address) . urlencode(' ') . urlencode($city) . '.json', 
        $response = $client->get('https://api.tomtom.com/search/2/geocode/' . urlencode($address) . '.json', [
            'query' => [
                'key' => 'saAJZBAB7obGDCgcrpeb06nOD7Zcltsi', // chiave API di TomTom PERSONALE
            ],
        ]);
        // Decodifico la risposta JSON e recupera le coordinate geografiche
        $geocode_data = json_decode($response->getBody(), true);
        $longitude = $geocode_data['results'][0]['position']['lon'] ?? null;
        $latitude = $geocode_data['results'][0]['position']['lat'] ?? null;

        $newSuite->longitude = $longitude;
        $newSuite->latitude = $latitude;
        // -------------------------------------------------------------------------------------

        // $newSuite->visible = $data['visible'];
        // $newSuite->sponsor = $data['sponsor'];
        if ($request->has('img')) {
            $image_path = Storage::put('uploads', $data['img']);
            $newSuite->img = $image_path;
        }
        $newSuite->img = $image_path;
        $newSuite->user_id = Auth::user()->id;

        //  $newSuite->slug = STR::slug($newSuite->title, '-');
        //  $newSuite->type_id = $data['type_id'];


        // $sponsorship = $data['sponsorship'];


        $newSuite->save();

        // if (isset($data['sponsorship'])) {
        //     $newSuite->sponsors()->attach($sponsorship);
        //     // $newSuite->getNameOfCourse()->attach('gold');
        //     // $newSuite->getName()->attach('nome dello sponsor');
        // } else {
        //     return redirect()->route('admin.suite.show', $newSuite->id);
        // }

        return redirect()->route('admin.suite.show', $newSuite->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {

        //  $selectedProject =  Project::findOrFail($id);
        $selectedSuite = Suite::findOrFail($id);
        $user = auth()->user();

        // Verifica se l'utente autenticato è lo stesso dell'appartamento
        if ($selectedSuite->user_id != $user->id) {
            // Se l'utente non è autorizzato, mostra la pagina 404
            abort(403);
        }
        $data = [
            "selectedSuite" => $selectedSuite,
            'address' => explode(',', $selectedSuite->address)
        ];
        //  // $selectedTech = Technology::findOrFail();
        //  $data = [
        //      "project" => $selectedProject,
        //      "technology" => $selectedProject->technologies
        //  ];
        return view('admin.suite.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $suite = Suite::findOrFail($id);
        $user = auth()->user();

        // Verifica se l'utente autenticato è lo stesso dell'appartamento
        if ($suite->user_id != $user->id) {
            // Se l'utente non è autorizzato, mostra la pagina 404
            abort(403);
        }
        $data = [
            'suite' => $suite,
            // 'address' => explode(',', $suite->address)
        ];
        return view('admin.suite.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $suite = Suite::findOrFail($id);
        $user = auth()->user();
        if ($suite->user_id != $user->id) {
            // Se l'utente non è autorizzato, mostra la pagina 404
            abort(403);
        }

        $data = $request->validate([
            "title" => "required|min:5",
            "room" => "required|min:1|between:1,20",
            "bed" => "required|min:1|between:1,20",
            "bathroom" => "required|min:1|between:1,10",
            "squareM" => "required|integer|min:25",
            "address" => "required|min:8",
            "img" => "",
            "visible" => "nullable",
            "sponsor" => "nullable",
        ]);
        //  $address = $data['address'] . ' ' . $data['civic']  . ' ' . $data['city'] . ' ' . $data['cap'];
        // $data['address'] = $data['address'] . ',' . $data['civic']  . ',' . $data['city'] . ',' . $data['cap'];
        $address =  $data['address'];

        $client = new \GuzzleHttp\Client([
            'verify' => false
        ]);

        $response = $client->get('https://api.tomtom.com/search/2/geocode/' . urlencode($address) . '.json', [
            'query' => [
                'key' => 'saAJZBAB7obGDCgcrpeb06nOD7Zcltsi', // chiave API di TomTom PERSONALE
            ],
        ]);

        $geocode_data = json_decode($response->getBody(), true);
        $longitude = $geocode_data['results'][0]['position']['lon'] ?? null;
        $latitude = $geocode_data['results'][0]['position']['lat'] ?? null;

        $suite->longitude = $longitude;
        $suite->latitude = $latitude;

        $data['slug'] = Str::slug($request->title, '-');

        if ($request->has('img')) {
            Storage::delete($suite->img);
            $image_path = Storage::put('uploads', $data['img']);
            $data['img'] = $image_path;
        }

        $suite->update($data);

        return redirect()->route('admin.suite.show', $suite->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $suite =  Suite::findOrFail($id);
        Storage::delete($suite->img);
        $suite->delete();

        return redirect()->route('admin.suite.index')->with('message', 'Project Deleted');
    }
}
