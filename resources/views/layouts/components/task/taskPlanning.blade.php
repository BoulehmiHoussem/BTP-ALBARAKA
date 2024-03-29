<div class="col-md-2">
<div class="list-group">
  @foreach($dates as $key => $date)
    <a class="list-group-item @if($key==0) searchdateactivate @else searchdate @endif" data-planning='{{$id_planning}}' data-date='{{date("Y-m-d", strtotime($date))}}'>{{ $date }}</a>
  @endforeach
    <input type="hidden" value="{{$dates[0]}}" id="current_date">
</div>
</div>
<div class="card col-lg-10">
        
        <ul class="list">
        
        <li id="tasklistplanning">
                <div class="content"> 
                    
                    <div class="center_content">
                        <input type="text" class="form-control" placeholder="Veuillez choisir une tache !" id="searchnav">
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
            <div id="listed_li">
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
            </div>
        </ul>
        @include('layouts.components.task.dateModal')
    </div>
