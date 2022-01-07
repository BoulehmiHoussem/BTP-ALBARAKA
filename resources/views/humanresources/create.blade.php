@extends('layouts.app')

@section('css')
@endsection

@section('main')
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Nouveau utilisateur</h4>
                  <form class="forms-sample" method='POST' action='{{ route("rh.store") }}'>
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="name" value="{{ old('nom') }}" class="form-control" id="exampleInputName1" placeholder="Nom">
                      @error('nom')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Email</label>
                      <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail3" placeholder="Email">
                      @error('email')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Mot de passe</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control" id="exampleInputEmail3" placeholder="adresse">
                        @error('password')
                          <span class="badge badge-danger col-md-12" role="alert">
                            <strong>{{ $message }}</strong>
                          </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail3">Type</label>
                        <select class="form-control" name="type">
                            <option class="form-control" value="1"> Superviseur </option>
                            <option class="form-control" value="2"> Chef chantier </option>
                        </select>
                        @error('password')
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
