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
                                <div class="actionstask " id="actions-{{$subtask->id}}" style='display:none'> 
                                    <a href="#" class=" text-success" data-toggle="modal" data-target="#productmodal-{{$subtask->id}}"> <i class="mdi mdi-cart-plus"></i> </a>
                                    <a href="#" class=" text-primary" data-toggle="modal" data-target="#locationmodal-{{$subtask->id}}"> <i class="mdi mdi-car"></i> </a>
                                    <a href="#" class=" text-dark"> <i class="mdi mdi-account-multiple"></i> </a>
                                 </div> 
                            </div> 
                            <span class="text-primary normallink"><input id="start-{{$subtask->id}}" type="time" class="form-control"> </span>
                            <span class="text-primary normallink"><input id="end-{{$subtask->id}}" type="time" class="form-control"> </span>
                            <div style="line-height: 3;">
                                <a class="btn btn-success btn-rounded btn-table" href="#" id="show-{{$subtask->id}}" onclick="return registerSub({{$subtask->id}}, '{{ route('tasks.registersub') }}' ,'{{ csrf_token() }}')">
                                    <i class="mdi mdi-check "> </i>
                                </a> 
                                <a class="btn btn-danger btn-rounded btn-table" id="hide-{{$subtask->id}}" style="display:none" href="#" onclick="return removeSub({{$subtask->id}})">
                                    <i class="mdi mdi-close "> </i>
                                </a> 
                            </div>
                        </div>
                        @include('layouts.components.task.products', ['products' => $subtask->subtaskproducts, 'counter' => $subtask->id, 'selectable' => true])
                        @include('layouts.components.task.location', ['locations' => $subtask->subtasklocations, 'counter' => $subtask->id, 'selectable' => true])    
                    @endforeach  
                </div>
                
            </li>