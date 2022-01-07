@extends('layouts.app')

@section('css')
@endsection

@section('main')
            @include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description, 'action' => route('rh.create')])
            <div class="row">
            <div class="col-lg-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Striped Table</h4>
                  <p class="card-description">
                    Add class <code>.table-striped</code>
                  </p>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User
                          </th>
                          <th>
                            Nom
                          </th>
                          <th>
                            Email
                          </th>
                          <th>
                            Type
                          </th>
                          <th>
                            
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                          <td class="py-1">
                            <img src="../../images/logo.png" alt="image">
                          </td>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            @if($user->type == 1)
                            <label class="badge badge-info">Superviseur</label>
                            @elseif($user->type == 2)
                            <label class="badge badge-primary">Chef chantier</label>
                            @else
                              <label class="badge badge-success">Admin</label>
                            @endif
                          </td>
                          <td>
                          <td style="text-align: right">
                            @php $route =  "ccc"  @endphp
                            @include('layouts.components.actionbuttons', ['modifier' => $route ])
                          </td>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
@endsection
            

@section('js')
@endsection