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
                                    <a href="#" class=" text-success" data-toggle="modal" data-target="#productmodal-{{$subtask->id}}"> <i class="mdi mdi-cart-plus"></i> </a>
                                    <a href="#" class=" text-primary" data-toggle="modal" data-target="#locationmodal-{{$subtask->id}}"> <i class="mdi mdi-car"></i> </a>
                                    <a href="#" class=" text-dark"> <i class="mdi mdi-account-multiple"></i> </a>
                                 </div> 
                            </div> 
                            <span class="normallink text-primary" data-toggle="modal" data-target="#dateModal"> De zzzzzz a zzzzzz </span>
                        </div>
                        @include('layouts.components.task.products', ['products' => $subtask->subtaskproducts, 'counter' => $subtask->id, 'selectable' => true])
                        @include('layouts.components.task.location', ['locations' => $subtask->subtasklocations, 'counter' => $subtask->id, 'selectable' => true])    
                    @endforeach  
                </div>
                
            </li>