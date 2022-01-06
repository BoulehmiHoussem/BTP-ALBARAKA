<div class="card col-lg-12">
        <div class="inner_card">
            <h4 class="setdate">11 January,Monday 2021</h4>
            <h5 class="settime">4:00 PM</h5>
        </div>
        <ul class="list">
        <li>
                <div class="content"> 
                    <div class="center_content">
                        <input type="text" class="form-control" id="searchnav">
                        <div class="searchnav">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody id="taskslist">  
                            
                                </tbody>
                        </table>
                    </div>
                        </div>
                    </div> 
                    <span class="normallink"> 
                        <a class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample" role="button" aria-expanded="false" aria-controls="multiCollapseExample">
                            <i id="tick1" class="mdi mdi-magnify"></i>
                        </a>
                    </span>
                </div>
                
            </li>
            
            @foreach($tasks as $task)
            <li>
                <div class="content"> 
                    <div class="center_content">
                        <small class="check1" onclick="checked(1)"></small> 
                        <strike id="strike1" class="strike_none">{{ $task->name }}</strike> 
                    </div> 
                    <span class="normallink"> 
                        <a class="btn btn-link" data-toggle="collapse" href="#multiCollapseExample{{ $task->id }}" role="button" aria-expanded="false" aria-controls="multiCollapseExample{{ $task->id }}">
                            <i id="tick1" class="mdi mdi-eye"></i>
                        </a>
                    </span>
                </div>
                
                <div id="multiCollapseExample{{ $task->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                    @foreach($task->subtasks as $subtask)
                        <div class="content"> <span class="subtask"><i class="mdi mdi-subdirectory-arrow-right"></i></span> 
                            <div class="center_content"> 
                                <small class="check2" onclick="checked(2)"></small>
                                <strike id="strike2" class="strike_none">{{ $subtask->name }}</strike> 
                                <div class="actionstask"> 
                                    <a href="#" class=" text-success"> <i class="mdi mdi-cart-plus"></i> </a>
                                    <a href="#" class=" text-primary"> <i class="mdi mdi-car"></i> </a>
                                    <a href="#" class=" text-dark"> <i class="mdi mdi-account-multiple"></i> </a>
                                 </div> 
                            </div> 
                            <span class="normallink text-primary" data-toggle="modal" data-target="#dateModal"> De zzzzzz a zzzzzz </span>
                        </div>
                    @endforeach  
                </div>
                
            </li>
            @endforeach
        </ul>
        @include('layouts.components.task.dateModal')
    </div>