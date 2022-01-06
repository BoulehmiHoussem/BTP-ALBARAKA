@extends('layouts.app')

@section('css')
@endsection

@section('main')
            @include('layouts.components.actions' , ['mainTitle' => $title , 'description' => $description])
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
                            <img src="../../images/faces/face1.jpg" alt="image">
                          </td>
                          <td>
                            {{ $user->name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            <label class="badge badge-success">Admin</label>
                          </td>
                          <td>
                          <button type="button" class="btn btn-primary btn-sm pull-right"> Modifier</button>
                          <button type="button" class="btn btn-danger btn-sm"> Supprimer</button>
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