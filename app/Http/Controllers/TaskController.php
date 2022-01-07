<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;
use App\Models\Subtasks;
use App\Models\SubtaskProduct;
use App\Models\SubtaskLocation;
use App\Models\PlanningTak;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->title = "Tâches";
        $this->description = "Gérez vos tâches";
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::paginate(10);
        return view("tasks.list")
        ->with('tasks', $tasks)
        ->with('title' , $this->title)
        ->with('description' , $this->description);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task->name = $request->input('name');
        $task->comment = "hehehe";
        $task->created_by = 1;
        $task->save();

        $subs = $request->input('sub');
        foreach($subs as $sub)
        {
            $subtask = new Subtasks();
            $subtask->name = $sub['name'];
            $subtask->task_id = $task->id;
            $subtask->created_by = 1;
            $subtask->save();

            (isset($sub['products'])) ? ($subtaskprods = $sub['products']) : $subtaskprods = array();
            (isset($sub['location'])) ? ($subtasklocs = $sub['location']) : $subtasklocs= array() ;
            foreach ($subtaskprods as $subtaskprod)
            {
                $product = new SubtaskProduct();
                $product->subtask_id = $subtask->id;
                $product->product_id = $subtaskprod;
                $product->product_quantity = $sub['quantity'][$subtaskprod];
                $product->save();
            }

            foreach ($subtasklocs as $subtaskloc)
            {
                $location = new SubtaskLocation();
                $location->subtask_id = $subtask->id;
                $location->location_id = $subtaskloc;
                $location->location_from = $sub['from'][$subtaskloc];
                $location->location_to = $sub['to'][$subtaskloc];
                $location->save();
            }
        }

        return redirect()->route('tasks.list');
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
        $task = Task::findOrFail($id);
        $subtasks = Subtasks::where('task_id', '=', $id)->with('subtaskproducts.products')->get();
        //dd($subtasks[0]->subtaskproducts);
        return view('tasks.edit')
        ->with('task', $task)
        ->with('subtasks', $subtasks);
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

    public function newTask(Request $request)
    {
        $data = [
            'row' => (string)view('ajax.sousTachesAjax')->with("counter" ,$request->input('counter')),
            'modal' => (string)view('layouts.components.task.products')->with("counter" ,$request->input('counter')),
            'location' => (string)view('layouts.components.task.location')->with("counter" ,$request->input('counter'))
        ];
        return $data;
    }

    public function search(Request $request)
    {
        $task = Task::where("name", 'like',  "%".$request->search."%")->orWhere("id", 'like',  "%".$request->search."%")->get();
       
            return view('ajax.taskSearchAjax')
            ->with('tasks' , $task)
            ->with('planning_id', $request->planning_id);
        
    }

    function getTask(Request $request)
    {
    
        $task = Task::where('id', $request->id)->with('subtasks.subtaskproducts.products')->first();
        $planning = new PlanningTak();
        $planning->task_id = $request->id;
        $planning->planning_id = $request->planning_id;
        $planning->created_by = 1;
        $planning->save();
        return view('ajax.planningTaskAjax')->with('task', $task);
    }
}
