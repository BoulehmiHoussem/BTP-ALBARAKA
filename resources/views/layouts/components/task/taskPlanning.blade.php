<div class="col-md-2">
<div class="list-group">
  <a href="#" class="list-group-item active">
    Dates
  </a>
  @foreach($dates as $date)
    <a class="list-group-item searchdate" data-planning='{{$id_planning}}' data-date='{{date("Y-m-d", strtotime($date))}}'>{{ $date }}</a>
    
  @endforeach
  
</div>
</div>
<div class="card col-lg-10">
        
        <ul class="list">
        
        <li id="tasklistplanning">
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
            @if(sizeof($tasks) != 0)
                @foreach($tasks as $task)
                    @include('ajax.planningTaskAjax', ['task' => $task, 'id_planning' => $id_planning])
                @endforeach
            @else
                <div class="col-md-12 nodata">
                    <div class="rounded-circle">
                        <i class="mdi mdi-exclamation"></i>
                    </div>
                    
                </div>
            @endif
        </ul>
        @include('layouts.components.task.dateModal')
    </div>
