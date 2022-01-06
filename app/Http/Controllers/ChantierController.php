<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Chantier;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ChantierRequest;


class ChantierController extends Controller
{
    public function __construct()
    {
        $this->title = "Chantiers";
        $this->description = "Gérez vos chantiers";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chantiers = Chantier::paginate(10); 
        if (isset($_GET['ajax']))
        {
            return view('ajax.chantiersAjax')
            ->with('chantiers' , $chantiers);
        }
        else
        {
            return view('chantiers.list')
            ->with('title' , $this->title)
            ->with('description' , $this->description)
            ->with('chantiers' , $chantiers);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('chantiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ChantierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChantierRequest $request)
    {
        Chantier::create([
            "nom" => $request->input('nom'),
            "adresse" => $request->input('adresse'),
            "comment" => $request->input('comment'),
            "chef_id" => $request->input('chef_id'),
            "created_by" => Auth::id()
        ]);
        return redirect()->route('chantiers.list');
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
        $chantier = Chantier::findOrFail($id);
        return view('chantiers.edit')
        ->with('chantier', $chantier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ChantierRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChantierRequest $request, $id)
    {
        $chantier = Chantier::find($id);
        $chantier->nom = $request->input('nom');
        $chantier->adresse = $request->input('adresse');
        $chantier->comment = $request->input('comment');
        $chantier->chef_id = $request->input('chef_id');
        $chantier->update();
        return redirect()->route('chantiers.list');
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
}
