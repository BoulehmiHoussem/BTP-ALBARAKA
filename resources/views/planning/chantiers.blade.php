@extends('layouts.app')

@section('css')
<style>

</style>
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => "Planning" , 'description' => "Choisissez un chantier"])
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p>
                    <div class="row">
                        <div class="row icons-list">
                            @foreach($chantiers as $chantier)
                            <div class="col-sm-6 col-md-4 col-lg-3 chantierselect"> 
                                <a href="{{ route('planning.list', ['id' => $chantier->id]) }}" >
                                    <div >
                                        <i class="mdi mdi-hospital-building menu-icon"></i> {{ $chantier->nom }}
                                    </div>
                                </a>
                            </div>
                            
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{$chantiers->links()}}
                        </div>
                    </div>
                </div>
            </div>
</div>

@endsection