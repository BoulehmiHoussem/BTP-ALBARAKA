<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\PlanningTak;
use App\Models\Task;
use App\Models\Planning;
use App\Models\Chantier;

class PlanningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chantiers = Chantier::paginate(32); 
        if (isset($_GET['ajax']))
        {
            return view('ajax.chantiersAjax')
            ->with('chantiers' , $chantiers);
        }
        else
        {
            return view("planning.chantiers")->with('chantiers', $chantiers);
        }
        
    }

    public function plannings($id)
    {
        $plannings = Planning::where('chantier_id', $id)->get();
        return view("planning.list")->with('plannings', $plannings)->with('action', route('planning.create', ['id' => $id]))->with('chantier_id', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("planning.create")->with('chantier_id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $planning = new Planning();
        $planning->name = $request->input("name");
        $planning->start_date = $request->input("start_date");
        $planning->end_date = $request->input("end_date");
        $planning->comment = $request->input("comment");
        $planning->chantier_id = $request->input("chantier_id");
        $planning->save();
        return redirect()->route('planning.list', ['id' => $planning->chantier_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_chantier, $id_planning)
    {
        $planning = Planning::findOrFail($id_planning);
        $firstdate = strtotime($planning->start_date);
        $lastdate = strtotime($planning->end_date);

        $dates[0] = date("Y-m-d", $firstdate);
        $days = 1;

        do
        {
            $dates[$days] = date("Y-m-d", strtotime($days." day", $firstdate));
            $days ++;
        }while (strtotime($days." day", $firstdate) <= $lastdate);

        $tasks = PlanningTak::where('planning_id', $id_planning)
                    ->where("created_at", $planning->start_date)
                    ->with(['tasks.subtasks.subtaskproducts.products', 'tasks.subtasks.subtasklocations.locations'])->get()->pluck('tasks');  
            return view('planning.calendar')
                ->with('tasks', $tasks)
                ->with('id_planning', $id_planning)
                ->with('dates', $dates);
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
