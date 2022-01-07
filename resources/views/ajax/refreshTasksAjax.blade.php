            @if(sizeof($tasks) != 0)
                @foreach($tasks as $task)
                    @include('ajax.planningTaskAjax', ['task' => $task, 'id_planning' => $id_planning])
                @endforeach
            @else
            </div>
                <div class="col-md-12 nodata">
                    <div class="rounded-circle">
                        <i class="mdi mdi-exclamation"></i>
                    </div>
                    
                </div>
            @endif