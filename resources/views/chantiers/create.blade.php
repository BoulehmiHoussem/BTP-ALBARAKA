@extends('layouts.app')

@section('css')
@endsection

@section('main')
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">nouveau chantier</h4>
                  <form class="forms-sample" method='POST' action='{{ route("chantiers.store") }}'>
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Nom</label>
                      <input type="text" name="nom" value="{{ old('nom') }}" class="form-control" id="exampleInputName1" placeholder="Nom">
                      @error('nom')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail3">Adresse</label>
                      <input type="text" name="adresse" value="{{ old('adresse') }}" class="form-control" id="exampleInputEmail3" placeholder="adresse">
                      @error('adresse')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleSelectGender">Chef chantier</label>
                        <select class="form-control" name="chef_id" id="exampleSelectGender">
                          <option value="1">Male</option>
                          <option value="2">Female</option>
                        </select>
                        @error('chef_id')
                        <span class="badge badge-danger col-md-12" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Commentaire</label>
                      <textarea name="comment"   type="text" class="form-control" id="trumbowyg-demo" placeholder="Commentaire"> {{ old('comment') }} </textarea>
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