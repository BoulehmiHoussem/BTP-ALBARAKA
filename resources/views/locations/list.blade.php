@extends('layouts.app')

@section('css')
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description , 'action' => route('locations.create')])
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Bordered table</h4>
                  <p class="card-description">
                    Add class <code>.table-bordered</code>
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Désignation
                          </th>
                          <th>
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody id='tbody'>
                        @foreach ($locations as $location)
                        <tr>
                          <td>
                            {{ $location->id }}
                          </td>
                          <td>
                          {{ $location->name }}
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                      
                    </table>
                    
                  </div>
                  <div class="d-flex justify-content-center">
                    {{ $locations->links() }}
                  </div>
                </div>
              </div>
            </div>

@endsection
@section('js')

@endsection