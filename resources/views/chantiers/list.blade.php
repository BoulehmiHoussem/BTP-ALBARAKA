@extends('layouts.app')

@section('css')
@endsection

@section('main')
@include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description , 'action' => route('chantiers.create')])

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
                            Nom
                          </th>
                          <th>
                            Adresse
                          </th>
                          <th>
                            Chef chantier
                          </th>
                          <th style="text-align: right">
                            Actions
                          </th>
                        </tr>
                      </thead>
                      <tbody id="tbody">
                        @foreach ($chantiers as $chantier)
                        <tr>
                          <td>
                            {{ $chantier->id }}
                          </td>
                          <td>
                            {{ $chantier->nom }}
                          </td>
                          <td>
                            {{ $chantier->adresse }}
                          </td>
                          <td>
                            {{ $chantier->chef->name}}
                          </td>
                          <td style="text-align: right">
                            @php $route =  route('chantiers.edit', ["id" => $chantier->id] )  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-center">
                      {{ $chantiers->links() }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
            

@section('js')

@endsection