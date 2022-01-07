@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('main')
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Ajouter un planning</h4>
                  <form class="form-sample" action="{{ route('planning.store') }}" method='post'>
                    @csrf
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Nom planning</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control">
                            <input type="hidden" name="chantier_id" value="{{ $chantier_id }}" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date de début</label>
                          <div class="col-sm-9">
                            <input type="date" name="start_date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date de fin</label>
                          <div class="col-sm-9">
                            <input type="date" name="end_date" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Description</label>
                          <div class="col-sm-9">
                            <textarea id="comment" name="comment" type="date" class="form-control"> </textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Valider</button>
                    <button class="btn btn-light">Annuler</button>
                  </form>
                  </form>
                </div>
              </div>
            </div>
            @endsection

            @section('js')
            <script>
                $('document').ready(function(){
                    $('#comment').trumbowyg();
                })
            </script>
            @endsection