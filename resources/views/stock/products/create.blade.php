@extends('layouts.app')

@section('css')
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description])
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Horizontal Two column</h4>
                  <form class="form-sample" method="POST" action="{{route('products.store')}}">
                    @csrf
                    <p class="card-description">
                      Personal info
                    </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Produit</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            @error('name')
                                <span class="badge badge-danger col-md-12"  role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Référence</label>
                          <div class="col-sm-9">
                            <input type="text" name="reference" value="{{ old('reference') }}" class="form-control">
                            @error('reference')
                                <span class="badge badge-danger col-md-12" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Quantité</label>
                          <div class="col-sm-9">
                            <input type="text" name="quantity" class="form-control" value="{{ old('quantity') }}">
                            @error('quantity')
                                <span class="badge badge-danger col-md-12"  role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Prix</label>
                          <div class="col-sm-9">
                            <input type="text" name="price" class="form-control">
                            @error('price')
                                <span class="badge badge-danger col-md-12"  role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Fournisseur</label>
                          <div class="col-sm-9">
                            <input type="text" name="fournisseur" class="form-control">
                            @error('fournisseur')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-rounded btn-fw">Valider</button>
                    <button type="button" class="btn btn-secondary  btn-rounded btn-fw">Annuler</button>
                  </form>
                </div>
                <div class="card-footer"> 
                
                </div>
              </div>
            </div>
@endsection
            

@section('js')
@endsection