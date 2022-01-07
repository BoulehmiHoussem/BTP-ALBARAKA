@extends('layouts.app')

@section('css')
<style>
    .text-success i{
        font-size: 15px;
    }
</style>
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => "Plannings" , 'description' => "Gérer vos plannings" , 'action' => $action ])
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Liste des plannings</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            Id
                          </th>
                          <th>
                            Planning
                          </th>
                          <th>
                            Date de debut
                          </th>
                          <th>
                            Date de fin
                          </th>
                          <th style="text-align: right">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(sizeof($plannings) != 0)
                        @foreach($plannings as $planning)
                        <tr>
                          <td class="py-1">
                            {{ $planning->id }}
                          </td>
                          <td>
                            {{ $planning->name }}
                          </td>
                          <td>
                            {{ $planning->start_date }}
                          </td>
                          <td>
                            {{ $planning->end_date }}
                          </td>
                          <td style="text-align: right">
                            <a class="btn btn-primary btn-rounded btn-table" href="{{ route('planning.calendar', ['id_chantier' => $chantier_id , 'id_planning' => $planning->id]) }}">
                                <i class="mdi mdi-playlist-check"> </i>
                            </a>
                          </td>
                        </tr>
                        @endforeach
                        @else
                        <div class="col-md-12 nodata">
                            <div class="rounded-circle">
                                <i class="mdi mdi-exclamation"></i>
                            </div>
                            
                        </div>
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
@endsection