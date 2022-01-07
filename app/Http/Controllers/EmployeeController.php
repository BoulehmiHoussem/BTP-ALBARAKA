<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employe;
use App\Http\Requests\EmployeeRequest;

class EmployeeController extends Controller
{

    public function __construct()
    {
        $this->title = "Employee";
        $this->description = "Gérez vos employee";
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employe::paginate(10);
        if (isset($_GET['ajax']))
        {
            return view('ajax.employeesAjax')
            ->with('employee' , $employee);
        }
        else
        {
            return view('employee.list')
            ->with('title' , $this->title)
            ->with('description' , $this->description)
            ->with('employees' , $employees);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\EmployeeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        Employe::create([
            "nom" => $request->input('nom'),
            "cin" => $request->input('cin'),
            "telphone" => $request->input('telphone'),
            "created_by" => Auth::id()
        ]);
        return redirect()->route('employee.list');
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
        $employee = Employe::findOrFail($id);
        return view('employee.edit')
        ->with('employee', $employee);
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
        $employee = Employe::find($id);
        $employee->nom = $request->input('nom');
        $employee->cin = $request->input('cin');
        $employee->telphone = $request->input('telphone');
        $employee->update();
        return redirect()->route('employee.list');
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
