<?php

namespace App\Http\Controllers;

use App\Models\Suite;
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
            'suite' => Suite::with('user',
            'messages',
            'visuals',
            'sponsors',
            'services'
            )->select()->where('user_id',$user_id)->get()
            
            // 'type' => Type::all() Non è necessario in quanto recupera il nome del type attraverso la RELATIONS delle tabelle
        ];
        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Suite $suite)
    {
        //
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
