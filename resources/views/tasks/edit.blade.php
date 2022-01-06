@extends('layouts.app')

@section('css')
@endsection

@section('main')
          <form class="forms-sample" method='post' action="{{ route('tasks.store') }}">
            @csrf
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  
                  
                    <div class="form-group">
                      <label for="exampleInputName1">Tâche</label>
                      <input type="text" name='name' value='{{$task->name}}' class="form-control" id="exampleInputName1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="comment">Commentaire</label>
                      <textarea type="" class="form-control" id="comment" placeholder="Email"> {{$task->comment}} </textarea>
                    </div>
                    
                    

                  
                </div>
              </div>
            </div>

            

            <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0" id="addnewtask">
                      <i class="mdi mdi-plus text-muted"></i>
            </button>
            @include('layouts.components.task.task', ['subtasks' => $subtasks])
            <button type="submit" class="btn btn-primary mr-2">Submit</button>
            <button class="btn btn-light">Cancel</button>
                  </form>
            @endsection

            @section('js')
            <script>
                var counter = 0;
                var urlSearchProduct = "{{ route('products.search') }}"
                var urlSearchLocation = "{{ route('locations.search') }}"
                var urlNewTask = "{{ route('tasks.newtask') }}"

                function clickToGet(counter)
                {
                        var product = $('#product-'+counter).val()
                        getProduct(product, urlSearchProduct, "{{ csrf_token() }}", counter)
                        $('#product-'+counter).val("")
                }

                function clickToGetLocation(counter)
                {
                        var location = $('#location-'+counter).val()
                        alert(location)
                        getLocation(location, urlSearchLocation, "{{ csrf_token() }}", counter)
                        $('#location-'+counter).val("")
                }
                $('document').ready(function(){
                    $('#comment').trumbowyg();
                    $('#addnewtask').on('click', function(e){
                      e.preventDefault()
                      addTask(counter, urlNewTask, "{{ csrf_token() }}")
                      counter ++;
                    });
                    $('#submitproduct').on('click', function(e){
                        e.preventDefault();
                        var product = $(this).parent().parent().find('#product').val()
                        getProduct(product, urlSearchProduct, "{{ csrf_token() }}")
                        $(this).parent().parent().find('#product').val("")
                    })
                })
            </script>
            @endsection