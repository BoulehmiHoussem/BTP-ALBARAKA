@extends('layouts.app')

@section('css')
@endsection

@section('main')
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic form elements</h4>
                  
                  <form action='{{ route("locations.store") }}' method='post'>
                      @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Designation</label>
                      <input type="text" name='name' value='{{$location->name}}' class="form-control" id="exampleInputName1" placeholder="Name">
                      @error('name')
                                <span class="badge badge-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                      <label for="comment">Commentaire</label>
                      <textarea type="" name="comment" class="form-control" id="comment" placeholder="Email"> {{ $location->comment }} </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                    </form>

                  
                </div>
              </div>
            </div>

@endsection

@section('js')
    <script>
        $('document').ready(function(){
              $('#comment').trumbowyg();
        });
    </script>
@endsection