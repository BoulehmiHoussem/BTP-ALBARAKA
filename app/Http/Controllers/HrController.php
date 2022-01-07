<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\HrRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;


class HrController extends Controller
{
    public function __construct()
    {
        $this->title = "Resources Humaines";
        $this->description = "Gérez vos resources humaines";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('humanresources.list')
        ->with('title' , $this->title)
        ->with('description' , $this->description)
        ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('humanresources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\HrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HrRequest $request)
    {
        
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'type' => $request->input('type'),
            'password' => Hash::make($request->input('password')),
        ]);

        return redirect()->route('rh.list');
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
        //
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
        //
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
