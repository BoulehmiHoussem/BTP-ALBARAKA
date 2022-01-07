@extends('layouts.app')

@section('css')
@endsection

@section('main')
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">nouveau employee</h4>
                  <form class="forms-sample" method='POST' action='{{ route("employee.store", ["id" => $employee->id]) }}'>
                  <input type="hidden" name="id" value="{{ $employee->id }}" class="form-control" id="exampleInputName1" placeholder="Nom">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="nom" value="{{ $employee->nom }}" class="form-control" id="exampleInputName1" placeholder="Nom">
                      @error('nom')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Cin</label>
                      <input type="text" name="cin" value="{{ $employee->cin }}" class="form-control" id="exampleInputEmail3" placeholder="adresse">
                      @error('cin')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail3">Tel</label>
                        <input type="text" name="telphone" value="{{ $employee->telphone }}" class="form-control" id="exampleInputEmail3" placeholder="adresse">
                        @error('telphone')
                          <span class="badge badge-danger col-md-12" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
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
                    $('#trumbowyg-demo').trumbowyg();
                })
            </script>
            @endsection
