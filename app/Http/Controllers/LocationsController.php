<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LocationRequest;

use App\Models\Location;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->title = "Locations";
        $this->description = "Gérez vos locations";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::paginate(10);
        if (isset($_GET['ajax']))
        {
            return view('ajax.locationsAjax')
            ->with('locations' , $locations);
        }
        return view("locations.list")
        ->with('title', $this->title)
        ->with('description', $this->description)
        ->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("locations.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationRequest $request)
    {
        Location::create([
            'name' => $request->input('name'),
            'comment' => $request->input('comment'),
            'created_by' => 1
        ]);

        return redirect()->route('locations.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view("locations.edit")
        ->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $location = findOrFail($id);
        $location->name = $request->input('name');
        $location->comment = $request->input('comment');
        $location->created_by = 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(Request $request)
    {
        $location = Location::find($request->id);
        if($location)
        {
            return view('ajax.locationSearchAjax')
            ->with('location' , $location)
            ->with('counter', $request->counter);
        }
        else
        {
            return false;
        }
        
    }
}
